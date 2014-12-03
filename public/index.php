<?php

require_once __DIR__  . '/../vendor/autoload.php';

$app = new Skeleton\Application();
$app->attach('app.error', function($exception){
    echo $exception->getMessage();
});
$app->router()->addRoute('index', 'Skeleton\Controller\IndexController');
$app->run();



