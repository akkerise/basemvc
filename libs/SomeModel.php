<?php
namespace libs;

use libs\Model;

class SomeModel extends Model
{
    
    public function __construct()
    {
        parent::__construct();
        echo "<pre>"; var_dump("SomeModel"); die();
    }
}

