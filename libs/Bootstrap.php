<?php
namespace libs;

class Bootstrap
{

    public function __construct()
    {
        $url = explode('/', isset($_GET['url']) ? $_GET['url'] : null);
        
        if (empty($url[0])) {
            require CONTROLLERS_PATH . '/Index.php';
            $controller = new \Index();
            $controller->index();
            return false;
        }
        
        // load controllers folder
        $file = ROOT_PATH . DS . CONTROLLERS_PATH . DS . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            require CONTROLLERS_PATH . '/Fail.php';
            $controller = new \Fail();
            return false;
        }
        
        $controller = new $url[0]();
        $controller->loadModel($url[0]);
        
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                throw new \Exception('The method doesn\'t exists! ');
            }
        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            } else {
                $controller->index();
            }
        }
    }
}