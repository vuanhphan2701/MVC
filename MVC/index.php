<?php
include('system/AutoLoad.php');
$action = $_GET['action'] ?? 'index';
$controllerName = ($_GET['controller'] ?? 'system') . 'Controller';
if (class_exists($controllerName)) {

    $controller = new $controllerName();
    if (method_exists($controller, $action))
    {
        if (isVerified()) {
            $controller->$action();
        } else { 
            $user = (new userController())->authenticate();
        }
    } else {
        $controller = new Controller();
        $controller->_404();
    }
} else {
    $controller = new Controller();
    $controller->_404();
}
ob_end_flush();
