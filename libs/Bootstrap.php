<?php

class Bootstrap
{
    public function __construct()
    {


        $url = explode('/', isset($_GET['url']) ? $_GET['url'] : $_SERVER['QUERY_STRING']);
        $file = APP_PATH . DS . $url[0] . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            require APP_PATH . DS . 'error.php';
            $controller = new Error();
        }

        $controller = new $url[0];
        if (isset($url[2])) {
            $controller->{$url[1]}($url[2]);
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            }
        }

    }
}