<?php

use libs\Controller;

class Fail extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function index(){
        $this->view->msg = "This page is doesn't exists!";
        $this->view->render('fail/index');
    }
}