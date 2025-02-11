<?php

session_start();

require "../vendor/autoload.php";

//$whoops é uma biblioteca para mostrar os erros com mais detalhes
$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->allowQuit(false);
$whoops->writeToOutput(false);

use app\core\MyApp;
use app\core\AppExtract;

//dentro do try, são carregados os controllers e as views
try {
    $myApp = new MyApp(new AppExtract);
    $myApp->controller();
    $myApp->view();
} catch (Throwable $e) {
    $html = $whoops->handleException($e);
    echo $html;
}
