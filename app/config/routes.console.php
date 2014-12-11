<?php
/**
 * Routes config file for the app config
 */
return [
    'help' => [
        'controller' => 'Skeleton\Controller\ConsoleController',
        'action'     => 'help',
        'default'    => true
    ],
    'hello <name>' => [
        'controller' => 'Skeleton\Controller\ConsoleController',
        'action'     => 'hello'
    ]
];