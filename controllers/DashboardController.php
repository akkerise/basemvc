<?php

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // Session::init();
        // $logged = Session::get('loggedIn');
        // if ($logged == false) {
        //     echo "<pre>"; var_dump(2); die();
        //     Session::destroy();
        //     header('location: login');
        //     exit();
        // }
        echo "<pre>"; print_r(1); die();
    }

    public function index()
    {
        // $this->view->render('dashboard/index');
    }

    public function abc()
    {
        echo "<pre>"; print_r('abc'); die();
    }
}