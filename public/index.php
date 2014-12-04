<?php

require_once __DIR__  . '/../vendor/autoload.php';

$app = new Skeleton\Application();
$app->router()->addRoutes([
    '/' => [
        'controller' => 'Skeleton\Controller\WebController',
        'action'     => 'index',
        'default'    => true
    ],
    '/hello/:name[/:items*]' => [
        'controller' => 'Skeleton\Controller\WebController',
        'action'     => 'hello'
    ]
]);

$app->run();
