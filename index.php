<?php
require "libs/Bootstrap.php";
require "libs/Controller.php";
require "libs/View.php";
require "libs/Model.php";
require "libs/Database.php";
require "config/paths.php";
require "config/database.php";

use libs\Bootstrap;
use libs\Controller;
use libs\View;
use libs\Model;
use libs\Database;

define('CONTROLLERS_PATH', 'controllers'); // Controllers path
define('MODELS_PATH', 'models'); // Models path
define('ROOT_PATH', dirname(__DIR__) . '\basemvc'); // Root path
define('DS', '/'); // Dash slash

$app = new Bootstrap();
