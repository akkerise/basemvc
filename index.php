<?php

// Use an autoloader!
require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Database.php';
require 'libs/Session.php';

// Load config
require 'config/params.php';
require 'config/params_failed.php';
require 'config/database.php';

$app = new Bootstrap();
