<?php

use libs\Controller;

class Index extends Controller
{
    public function __construct()
    {
        parent::__construct();
        echo "Index page ?";
    }
}