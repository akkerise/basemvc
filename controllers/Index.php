<?php
use libs\Controller;

class Index extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->view->render('index/index');
    }

    public function details($param = false)
    {
        $this->view->render('index/index');
    }
}