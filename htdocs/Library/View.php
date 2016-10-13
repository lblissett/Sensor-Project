<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 10.10.2016
 * Time: 12:46
 */

namespace Mvc\Library;


class View
{
    protected $path, $controller, $action, $vars = [];
    /**
     * @param string $path           Basepath of the views.
     * @param string $controllerName Current controller.
     * @param string $actionName     Current action.
     */
    public function __construct($path, $controllerName, $actionName)
    {
        $this->path       = $path;
        $this->controller = $controllerName;
        $this->action     = $actionName;
    }
    /**
     * Set view vars. The object is given to the view.
     *
     * @param object $obj
     */
    public function setVars($obj)
    {
        $this->vars = ($obj);
    }
    /**
     * Render the view.
     *
     * @throws NotFoundException
     */
    public function render()
    {
        $fileName = $this->path.DIRECTORY_SEPARATOR.$this->controller.DIRECTORY_SEPARATOR.$this->action.'.phtml';
         if (!file_exists($fileName)) {
            echo json_encode($this->vars);
        }
        else {
            include $this->path.DIRECTORY_SEPARATOR.'layout.phtml';
            include $fileName;
        }



    }
}