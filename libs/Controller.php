<?php

class Controller
{

    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($name = null)
    {

        $ucName = ucfirst(strtolower(trim($name)));
        // require model
        $path = 'models' . DS . $ucName . 'Model.php';
        if (file_exists($path)) {
            require $path;
            $modelName = $ucName . 'Model';
            $this->model = new $modelName();
        }
    }
}