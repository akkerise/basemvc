<?php

use libs\Controller;

class Fail extends Controller
{
    public function __construct()
    {
        parent::__construct();
        echo "You're failed!<br>";
        $this->view->msg = "This page is doesn't exists!";
        $this->view->render('error/index');
    }
}