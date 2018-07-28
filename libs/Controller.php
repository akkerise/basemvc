<?php

class Controller
{

    public function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($nameC = null)
    {
        $modelName = $nameC . 'Model';
        $file = 'app/model/' . $nameC . 'Model.php';
        if(file_exists($file)){
            require $file;
            $modelName = $nameC . 'Model';
            $this->model = new $modelName();
        }        
    }
}