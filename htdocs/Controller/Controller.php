<?php

/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 10.10.2016
 * Time: 12:42
 */

namespace Mvc\Controller;

interface Controller
{
    public function setView(\Mvc\Library\View $view);
}