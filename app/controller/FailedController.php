<?php

class FailedController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function index($error = null)
    {
        if(!empty($error) || $error == null){
            $this->view->msg = $error;
        }
        $this->view->msg = "Failed: something error ... I dont't know ! WTF???";
        $this->view->render('failed/index');
    }
}