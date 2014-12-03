<?php

require_once __DIR__  . '/../vendor/autoload.php';

$app = new Skeleton\Application();
$app->router()->addRoutes([
    '/' => [
        'controller' => 'Skeleton\Controller\IndexController',
        'action'     => 'index'
    ],
    '/foo' => [
        'controller' => 'Skeleton\Controller\IndexController',
        'action'     => 'foo'
    ]
]);
$app->run();



