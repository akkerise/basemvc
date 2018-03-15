<?php

class View
{

    public function __construct()
    {}

    public function render($name, $noInclude = false)
    {
        if ($noInclude == true) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/block/header.php';
            require 'views/' . $name . '.php';
            require 'views/block/footer.php';
        }
    }
}