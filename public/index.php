<?php

require_once __DIR__  . '/../vendor/autoload.php';

$app = new Skeleton\Application();
$app->router()->addRoutes([
    '/' => [
        'controller' => 'Skeleton\Controller\WebController',
        'action'     => 'index',
        'default'    => true
    ],
    '/edit/:id' => [
        'controller' => 'Skeleton\Controller\WebController',
        'action'     => 'edit'
    ]
]);

$app->run();
