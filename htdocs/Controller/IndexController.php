<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 10.10.2016
 * Time: 12:43
 */

namespace Mvc\Controller;

use Mvc\Model\SensorData;
use Mvc\Model\User;
use Mvc\Model\Sensor;
use Mvc\Model\Site;
use Mvc\Library\AppTexts;
class IndexController extends BaseController implements Controller
{
    /** @var \Mvc\Library\View */
    protected $view;
    public function setView(\Mvc\Library\View $view)
    {
        $this->view = $view;
    }
    public function indexAction()
    {
        $users = new User();

        $_SESSION['language'] = $this->getParamGet('language');
        $this->view->setVars($users);

    }
    public function registerAction()
    {
        include ('./Library/password/password.php');
        $namesensorfield = $this->getParam('username');
        $locationfield = $this->getParam('email');
        $passwordfield = $this->getParam('password');
        $confirmpasswordfield = $this->getParam('confirmpassword');
        $timestamp = new \DateTime();
        $created = $timestamp->format("Y.m.d H:i:s");

        if (!$namesensorfield || !$locationfield || !$passwordfield || !$confirmpasswordfield) {
            throw new \Exception();
        }
        else {
            if (($namesensorfield == "")||($locationfield == "")||($passwordfield == "")||($confirmpasswordfield == "")){
                throw new \Exception();
            }
            else {
                if ($passwordfield == $confirmpasswordfield){
                    $passwort_hash = password_hash($passwordfield, PASSWORD_DEFAULT);

                    $user       = new User();
                    $user->username = $namesensorfield;
                    $user->email = $locationfield;
                    $user->password = $passwort_hash;
                    $user->created = $created;
                    $user->modified = $created;
                    $user->save();


                }
                else {
                    throw new \Exception();
                }
            }
        }

        header('Location: /index/index');


    }

    public function existsUserAction()
    {
        $text = new AppTexts();
        $username = $this->getParam('user');
        $site = new Site();

        if (!$username) {
            throw new \Exception();
        }
        else {
            if (($username == "")) {
                throw new \Exception();
            }
            else {
                /** @var User $user */
                $user = User::findOne("username = '" . $username . "'");
                if (empty($user)){
                    $site->usererror = null;
                } else {
                    if ($_SESSION['language'] == "de") {
                        $site->usererror = $text->userexists;
                    } else {
                        $site->usererror = $text->userexistsEN;
                    }
                }

            }

        }
        $this->view->setVars($site);

    }

    public function createSensorAction()
    {
        $namesensorfield = $this->getParam('sensorname');
        $locationfield = $this->getParam('location');
        $timestamp = new \DateTime();
        $created = $timestamp->format("Y.m.d H:i:s");
        $userid = $_SESSION['userid'];

        if (!$namesensorfield || !$locationfield || !$userid) {
            throw new \Exception();
        }
        else {
            if (($namesensorfield == "")||($locationfield == "")|| ($userid == "")){
                throw new \Exception();
            }
            else {
                $sensor = new Sensor();
                $sensor->name = $namesensorfield;
                $sensor->location = $locationfield;
                $sensor->userID = $userid;
                $sensor->modified = $created;

                if ($this->getParam('field') == "edit") {
                    $sensor->created = $this->getParam('created');
                    $sensor->pkid = $this->getParam('pkid');
                    $sensor->update($this->getParam('pkid'));

                } else {
                    $sensor->created = $created;
                    $sensor->save();
                }


            }
        }
        header('Location: /index/showLogin?site=table');
    }

    public function showLoginAction()
	{
        $site = new Site();
        $site->site = $this->getParamGet('site');
        $this->view->setVars($site);

	}

    public function getDataAction()
    {
        /** @var Sensor $sensors */
        $sensors = Sensor::findAll();
        $this->view->setVars($sensors);

    }

    public function testUserAction()
    {
        $text = new AppTexts();
        include ('./Library/password/password.php');
        $username = $this->getParam('loginuser');
        $password = $this->getParam('loginpw');
        $site = new Site();
        if (!$username || !$password) {
            throw new \Exception();
        }
        else {
            if (($username == "") || ($password == "")) {
                throw new \Exception();
            }
            else {
                /** @var User $user */
                $user = User::findOne("username = '" . $username . "'");
                if (empty($user)){
                     if ($_SESSION['language'] == "de") {
                         $site->usererror = $text->wronguser;
                    } else {
                         $site->usererror = $text->wronguserEN;
                    }
                } else {
                    if (password_verify($password,$user->password)){
                        $_SESSION['userid'] = $user->username;
                    }
                    else {
                        if ($_SESSION['language'] == "de") {
                            $site->pwerror = $text->wrongpw;
                        } else {
                            $site->pwerror = $text->wrongpwEN;
                        }
                    }
                }

            }

        }
        $this->view->setVars($site);
    }

    public function logoutAction()
    {
        session_start();
        session_destroy();
        header('Location: /index/index');
    }

    public function returnParametersAction()
    {
        $idsensor = $this->getParamGet('sensor_id');
        $temp = $this->getParamGet('temperature');
        $humi = $this->getParamGet('humidity');
        $timestamp = new \DateTime();
        $created = $timestamp->format("Y.m.d H:i:s");

        if (!$idsensor || !$temp || !$humi) {
            throw new \Exception();
        }
        else {
            if (($idsensor == "")||($temp == "")||($humi == "")){
                throw new \Exception();
            }
            else{
                $sensors = Sensor::findOne("pkid = ".$idsensor);
                if (empty($sensors)){
                    throw new \Exception();
                }
                else {
                        $sensordata = new SensorData();
                        $sensordata->id_sensor = intval($idsensor);
                        $sensordata->temperature = doubleval($temp);
                        $sensordata->humidity = doubleval($humi);
                        $sensordata->time = $created;

                        $sensordata->save();
                }

            }
        }
    }

    public function editAction()
    {
        $pkid = $this->getParamGet('pkid');
        $site = new Site();

        $sensor = Sensor::findOne("pkid = ".$pkid);
        $site->name = $sensor->name;
        $site->location = $sensor->location;
        $site->pkid = $sensor->pkid;
        $site->created = $sensor->created;

        $this->view->setVars($site);
    }

    public function deleteAction()
    {
        $pkid = $this->getParam('pkid');
        Sensor::delete("pkid = ".$pkid);
        $sensordata = SensorData::find("id_sensor = ".$pkid);
        if (empty($sensordata)){

        } else {
        SensorData::delete("id_sensor = ".$pkid);
    }
    }

    public function getInfosAction()
    {
        $sensordatas = SensorData::find('id_sensor = '.$this->getParamGet('pkid'));
        $this->view->setVars($sensordatas);
    }

    public function testpwAction()
    {
        include ('./Library/password/password.php');
        $oldpw = $this->getParam('pwchange');
        $site = new Site();
        if ($_SESSION['userid'] == ""){
            throw new \Exception();

        } else {
            if ($oldpw){
                if ($oldpw == ""){
                    throw new \Exception();
                } else {
                    $user = User::findOne("username = '" . $_SESSION['userid'] . "'");
                    if (password_verify($oldpw,$user->password)){
                        $site->pwerror = "erfolg";
                    }
                }
            }
            else {
                throw new \Exception();
            }
        }
        $this->view->setVars($site);
    }

    public function changepwAction()
    {
        include ('./Library/password/password.php');
        $newpw = $this->getParam('pwchange');

        if (($newpw == "")||($_SESSION['userid'] == "")){
            throw new \Exception();
        } else {
            $hashedpw = password_hash($newpw,PASSWORD_DEFAULT);
            $user = User::findOne("username = '" . $_SESSION['userid'] . "'");
            $user->password = $hashedpw;
            $user->update($user->pkid);
        }

    }
}
?>
