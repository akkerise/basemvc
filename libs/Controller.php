<?php
namespace libs;

class Controller
{
    public $view;
    public function __construct()
    {
        echo "Main Controller<br>";
        $this->view = new View();
    }
}