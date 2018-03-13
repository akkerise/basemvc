<?php
namespace libs;

class Controller
{

    public $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($name)
    {
        $ucName = ucfirst($name);
        $pathModel = ROOT_PATH . DS . MODELS_PATH . DS . $name . 'Model.php';
        if (file_exists($pathModel)) {
            require $pathModel;
            $modelName = $ucName . 'Model';
            $this->model = new $modelName();
        }
    }
}