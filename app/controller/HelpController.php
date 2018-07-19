<?php

class HelpController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->msg = 'HelpController';
        $this->view->render('help/index');
    }

    public function other($arg = false)
    {
    }
}