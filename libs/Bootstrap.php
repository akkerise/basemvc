<?php

class Bootstrap
{

    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

        if (empty($url[0])) {
            require "app/controller/IndexController.php";
            $controller = new IndexController();
            $controller->index();
            return false;
        }
        $nameC = explode('-', strtolower(trim($url[0])));
        if(count($nameC) > 0){
            array_walk($nameC, function(&$value, $key){
                $value = ucfirst($value);
            });
        }
        $nameC = implode($nameC);
        // check and require controller file
        $file = "app/controller/" . $nameC . "Controller.php";
        try{
            if (!file_exists($file)) {
                throw new Exception("Controller name is: ". $nameC . "Controller.php" ." does not exist! Directiory : " . $file);
            }
            require $file;
        }catch(Exception $e){
            echo "<pre>"; print_r($e->getMessage()); die();
        }

        $nameController = $nameC . "Controller";
        $controller = new $nameController();
        $controller->loadModel($nameC);

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
        require "app/controller/FailedController.php";
        $controller = new FailedController($constError);
        $controller->index($constError);
        return false;
    }

    private static function convertURI($uri){
        return split('(?=[A-Z][^A-Z])([\w\-\.]+[^#?\s]+)(.*)?(#[\w\-]+)', $uri);
    }
}