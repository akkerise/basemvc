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
            require 'controllers/IndexController.php';
            $controller = new IndexController();
            $controller->index();
            return false;
        }

        // check and require controller file
        $file = 'controllers/' . ucfirst(strtolower(trim($url[0]))) . 'Controller.php';
        try{
            if (!file_exists($file)) {
                throw new Exception("File name is: ". ucfirst(strtolower(trim($url[0]))) . 'Controller.php' ." does not exist!");
            }
            require $file;
        }catch(Exception $e){
            echo "<pre>"; print_r($e->getMessage()); die();
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