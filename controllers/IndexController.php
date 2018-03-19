<?php

class IndexController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->msg = 'Index';
        $this->view->render('index/index');
    }

    public function details()
    {
        $this->view->render('index/index');
    }
}