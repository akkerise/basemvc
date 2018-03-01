<?php

namespace libs;

class View
{
    public $msg;

    public function __construct()
    {
        echo "This is the view. <br>";
    }

    public function render($name)
    {
        require 'views/' . $name . '.php';
    }
}