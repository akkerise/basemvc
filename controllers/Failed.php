<?php

class Failed extends Controller {

	public function __construct() {
		parent::__construct();
	}
	
	function index() {
		$this->view->msg = 'This page doesnt exist';
		$this->view->render('failed/index');
	}

}