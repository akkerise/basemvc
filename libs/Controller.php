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
        // check and require model file
        $file = 'models/' . $ucName . 'Model.php';
        try{
            if (!file_exists($file)) {
                throw new Exception("File with name: ". $modelName . '.php' ." does not exist!");
            }
            require $file;
        }catch(Exception $e){
            echo "<pre>"; print_r($e->getMessage()); die();
        }
        $this->model = new $modelName();
    }
}