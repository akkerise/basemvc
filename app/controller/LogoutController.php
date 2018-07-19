<?php

class LogoutController extends Controller {

	public function __construct() {
		parent::__construct();	
		Session::destroy();
	}
	
	public function index() {
		$this->view->render('login/index');
	}

}