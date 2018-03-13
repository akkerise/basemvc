<?php

use libs\Controller;
use models\HelpModel;

class Help extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index(){
        $this->view->render('help/index');
    }
    
    public function other($arg = false)
    {
        require 'models/HelpModel.php';
        $model = new HelpModel();
        $this->view->blah = $model->blah();
    }
}