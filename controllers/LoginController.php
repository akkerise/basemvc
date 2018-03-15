<?php

class LoginController extends Controller {

	public function __construct() {
		parent::__construct();	
	}
	
	public function index() {
		$this->view->render('login/index');
	}
	
	public function clgt(){
		echo "<pre>"; var_dump('LoginController action : clgt'); die();
	}

}