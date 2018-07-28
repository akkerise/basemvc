<?php

class View
{

    public function __construct()
    {
        
    }

    public function render($name, $noInclude = false)
    {
        if ($noInclude == true) {
            require 'app/view/' . $name . '.php';
        } else {
            require 'app/view/block/header.php';
            require 'app/view/' . $name . '.php';
            require 'app/view/block/footer.php';
        }
    }
}