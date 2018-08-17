<?php

class Model
{
	public function __construct()
	{
		try
		{
			$this->db = new Database();
		}
		catch(PDOException $e)
		{
			echo "<pre>"; print_r($e->getMessage()); die();
		}

	}
}