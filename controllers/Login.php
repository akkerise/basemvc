<?php

use libs\Controller;
use models\LoginModel;

class Login extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        require 'models/LoginModel.php';
        $model = new LoginModel();
        $this->view->render('login/index');
    }
}