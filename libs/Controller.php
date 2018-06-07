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
        $modelName = $ucName . 'Model';
        $file = 'models/' . $ucName . 'Model.php';
        if(file_exists($file)){
            require $file;
            $modelName = $ucName . 'Model';
            $this->model = new $modelName();
        }        
        $this->model = new $modelName();
    }
}