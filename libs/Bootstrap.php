<?php

class Bootstrap
{

    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        // print_r($url);
        if (empty($url[0])) {
            require 'controllers/index.php';
            $controller = new Index();
            $controller->index();
            return false;
        }

        $file = 'controllers/' . $url[0] . 'Controller.php';
        if (file_exists($file)) {
            require $file;
        } else {
            self::failed(ERROR_CONTROLLER_NOT_EXIST);
        }

        $nameController = ucfirst(strtolower(trim($url[0]))) . 'Controller';
        $controller = new $nameController();
        $controller->loadModel($url[0]);
        
        // calling method with check parameters
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                self::failed(ERROR_PARAM_NOT_EXIST);
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    self::failed(ERROR_METHOD_NOT_EXIST);
                }
            } else {
                $controller->index();
            }
        }
    }

    private static function failed($constError = null)
    {
        require 'controllers/FailedController.php';
        $controller = new FailedController($constError);
        $controller->index($constError);
        return false;
    }
}