<?php

class HelpModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        echo "<pre>"; var_dump('blah'); die();
    }
}