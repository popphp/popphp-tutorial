<?php
/**
 * Routes config file for the app config
 */
return [
    '/' => [
        'controller' => 'Skeleton\Controller\WebController',
        'action'     => 'index',
        'default'    => true
    ],
    '/hello/:name[/:color]' => [
        'controller' => 'Skeleton\Controller\WebController',
        'action'     => 'hello'
    ],
    '/edit/user/:id' => [
        'controller' => 'Skeleton\Controller\WebController',
        'action'     => 'edit'
    ]
];