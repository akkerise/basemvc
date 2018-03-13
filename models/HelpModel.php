<?php
namespace models;

use libs\Model;

class HelpModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        echo 'HelpModel Class <br>';
    }
    
    public function blah(){
        echo "Blah";
    }
}