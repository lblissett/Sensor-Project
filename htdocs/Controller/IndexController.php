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
                    $site->usererror = "Benutzer existiert bereits!";
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
                $sensor->created = $created;
                $sensor->userID = $userid;
                $sensor->save();

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
                    $site->usererror = "Falscher Benutzer!";

                } else {
                    if (password_verify($password,$user->password)){
                        $_SESSION['userid'] = $user->username;
                    }
                    else {
                        $site->pwerror = "Falsches Passwort!";
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
}
?>
