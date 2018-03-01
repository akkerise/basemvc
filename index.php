<?php

require "libs/Bootstrap.php";
require "libs/Controller.php";
require "libs/View.php";
require "libs/Model.php";

use libs\Bootstrap;
use libs\Controller;
use libs\View;
use libs\Model;

define('APP_PATH', 'controllers'); // Application path
define('DS', '/');  // Dash slash

$app = new Bootstrap();
