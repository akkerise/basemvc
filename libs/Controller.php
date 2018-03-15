<?php
namespace libs;

class Controller
{

    public $model;

    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($name)
    {
        /*
         * $ucName = ucfirst($name);
         * $pathModel = ROOT_PATH . DS . MODELS_PATH . DS . $ucName . 'Model.php';
         * $path = 'models/' . $name . 'Model.php';
         * if (file_exists($path)) {
         * require $path;
         * $modelName = $ucName . 'Model';
         * $this->model = new $modelName();
         * }
         */
        $path = './' . 'SomeModel.php';
        if (file_exists($path)) {
            require $path;
            $modelName = 'SomeModel';
            $this->model = new $modelName();
        }
        
    }
}