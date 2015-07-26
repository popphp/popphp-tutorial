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
    'hello <name> [-y|--yell]' => [
        'controller' => 'Skeleton\Controller\ConsoleController',
        'action'     => 'hello'
    ],
    'edit <item> --id=' => [
        'controller' => 'Skeleton\Controller\ConsoleController',
        'action'     => 'edit'
    ],
    'edit help' => [
        'controller' => 'Skeleton\Controller\ConsoleController',
        'action'     => 'editHelp'
    ]
];