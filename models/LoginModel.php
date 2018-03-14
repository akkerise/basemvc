<?php
namespace models;

use libs\Model;

class LoginModel extends Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function test(){
		echo "CONNECTED";
	}
}

