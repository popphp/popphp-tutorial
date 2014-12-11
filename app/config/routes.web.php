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
    '/edit/:id' => [
        'controller' => 'Skeleton\Controller\WebController',
        'action'     => 'edit'
    ]
];