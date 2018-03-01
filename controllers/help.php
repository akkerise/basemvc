<?php

use libs\Controller;

class Help extends Controller
{
    public function __construct()
    {
        parent::__construct();
        echo "Help <br>";
    }

    public function other($args = false)
    {
        echo "We are other page <br>";
        require 'models/HelpModel.php';
        $model = new \models\HelpModel();
    }
}