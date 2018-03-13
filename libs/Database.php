<?php
namespace libs;

use PDO;

class Database extends PDO
{
    public function __construct(){
        parent::__construct('mysql:host=localhost;dbname=basemvc', 'root', '');
    }
}

