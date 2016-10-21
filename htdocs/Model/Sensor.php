<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 17.10.2016
 * Time: 08:20
 */

namespace Mvc\Model;


class Sensor extends ModelBase
{
    public $pkid, $name, $location, $userID, $created;
    public function getSource()
    {
        return 'sensor';
    }
}