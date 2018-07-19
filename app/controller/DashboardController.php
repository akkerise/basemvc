<?php

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        Session::init();
        $logged = Session::get('loggedIn');
        if (!$logged) {
            Session::destroy();
            header('location: login');
            exit();
        }
    }

    public function index()
    {
        $this->view->render('dashboard/index');
    }

    public function abc()
    {
        echo "<pre>";
        print_r('abc');
        die();
    }
}