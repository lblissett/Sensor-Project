<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 13.10.2016
 * Time: 08:58
 */

namespace Mvc\Controller;


class BaseController
{
    /**
     * @param string $key
     * @return string
     */
    public function getParam($key)
    {
       return isset($_POST[$key]) ? $_POST[$key] : '';
    }

    public function getParamGet($key)
    {
        return isset($_GET[$key]) ? $_GET[$key] : '';
    }
}