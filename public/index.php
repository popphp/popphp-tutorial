<?php

require_once __DIR__  . '/../vendor/autoload.php';

$app = new Skeleton\Application();
$app->router()->addRoute('index', 'Skeleton\Controller\IndexController');
$app->run();

