<?php
namespace libs;

class Fail extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->msg = 'This page doesn\'t exists';
        $this->view->render('fail/index');
    }
}