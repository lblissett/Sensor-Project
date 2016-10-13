<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 10.10.2016
 * Time: 12:43
 */

namespace Mvc\Controller;

use Mvc\Library\NotFoundException;
use Mvc\Model\User;
class IndexController implements Controller
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
        $users->name = "leo";
        $users->id = 1;
        $users->created = "test";

        $this->view->setVars($users);

    }
    public function showUserAction()
    {
        $uid = (int)(isset($_GET['uid']) ? $_GET['uid'] : '');
        if (!$uid) {
            throw new NotFoundException();
        }
        $user = User::findFirst($uid);
        if (!$user instanceof User) {
            throw new NotFoundException();
        }
    }
    public function createUserAction()
	{
		$user       = new User();
		$user->name = 'tester with space';
		$user->save();

		die('ok '.$user->id);
	}

	public function updateUserAction()
	{
        $uid = (int)(isset($_GET['uid']) ? $_GET['uid'] : '');

        $user       = User::findFirst($uid);
        $user->name = 'tester updated';
        $user->save();

        die('ok');
    	}

    public function testAction()
    {
        $users = new User();
        $users->name = "leo";
        $users->id = 1;
        $users->created = "test";

        $this->view->setVars($users);
    }
}