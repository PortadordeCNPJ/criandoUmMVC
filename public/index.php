<?php

use app\core\AppExtract;


session_start();

require "../vendor/autoload.php";

// require "../app/views/index.php";

$app = new AppExtract;
$controller = $app->controller();

var_dump($controller);