
<?php
/**
 * Created by PhpStorm.
 * User: Leo
 * Date: 10.10.2016
 * Time: 12:39
 */

// simple autoloader
spl_autoload_register(function ($className) {
    if (substr($className, 0, 4) !== 'Mvc\\') {
        // not our business
        return;
    }
    $fileName = __DIR__.'/'.str_replace('\\', DIRECTORY_SEPARATOR, substr($className, 4)).'.php';
    if (file_exists($fileName)) {
        include $fileName;
    }
});
// get the requested url
$url      = (isset($_GET['_url']) ? $_GET['_url'] : '');
$urlParts = explode('/', $url);


// build the controller class
$controllerName      = (isset($urlParts[0]) && $urlParts[0] ? $urlParts[0] : '');
$controllerClassName = '\\Mvc\\Controller\\'.ucfirst($controllerName).'Controller';

// build the action method
$actionName       = (isset($urlParts[1]) && $urlParts[1] ? $urlParts[1] : '');
$actionMethodName = $actionName.'Action';
try {
    if (!class_exists($controllerClassName)) {
        throw new \Mvc\Library\NotFoundException();
    }
    $controller = new $controllerClassName();
    if (!$controller instanceof \Mvc\Controller\Controller || !method_exists($controller, $actionMethodName)) {
        throw new \Mvc\Library\NotFoundException();
    }
    $view = new \Mvc\Library\View(__DIR__.DIRECTORY_SEPARATOR.'views', $controllerName, $actionName);
    $controller->setView($view);
    $controller->$actionMethodName();
    $view->render();
} catch (\Mvc\Library\NotFoundException $e) {
    http_response_code(404);
    echo 'Page not found: '.$controllerClassName.'::'.$actionMethodName;
} catch (\Exception $e) {
    http_response_code(500);
    echo 'Exception: <b>'.$e->getMessage().'</b><br><pre>'.$e->getTraceAsString().'</pre>';
}
?>
<script src="/assets/jquery3.1.1.min.js"></script>
<script src="/jQueryUI/v1_10_4/js/jquery-ui-1.10.4.custom.min.js"></script>
<link rel="stylesheet" href="/jQueryUI/v1_10_4/css/smoothness/jquery-ui-1.10.4.custom.css">
<link rel="stylesheet" href="/bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" href="/bootstrap-3.3.7-dist/table/v1.11.0/bootstrap-table.css">
<link rel="stylesheet" href="/assets/font-awesome/4_4_0/css/font-awesome.css">
<link rel="stylesheet" href="/assets/default.css">
<script src="/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<script src="/bootstrap-3.3.7-dist/table/v1.11.0/bootstrap-table.js"></script>
<script src="/bootstrap-3.3.7-dist/table/v1.11.0/locale/bootstrap-table-de-DE.js"></script>
<script src="/assets/default.js"></script>
