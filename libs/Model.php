<?php

class Model
{
    public $error;
    public function __construct()
    {
        try {
            $this->db = new Database();
            $this->error = null;
        }catch(PDOException $e){
            $this->error = $e->getMessage();
            die(json_encode($e->getMessage()));
        }
    }
}