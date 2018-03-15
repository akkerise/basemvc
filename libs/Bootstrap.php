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
        
        $file = 'controllers/' . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            $this->failed();
        }
        
        $controller = new $url[0]();
        
        // calling methods
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->failed();
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->failed();
                }
            } else {
                $controller->index();
            }
        }
    }

    public function failed()
    {
        require 'controllers/Failed.php';
        $controller = new Failed();
        $controller->index();
        return false;
    }
}