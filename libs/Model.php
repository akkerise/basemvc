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
			echo $e->getMessage();
		}

	}
}