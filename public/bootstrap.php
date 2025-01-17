<?php
session_start();

require "../vendor/autoload.php";

use app\core\MyApp;
use app\core\AppExtract;

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$myApp = new MyApp(new AppExtract);
$myApp->controller();
$myApp->view();
