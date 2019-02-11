<?php

return [
    'routes'   => [
        'show' => [
            'controller' => 'Tutorial\Controller\ConsoleController',
            'action'     => 'show',
            'help'       => 'Show current posts'
        ],
        'delete' => [
            'controller' => 'Tutorial\Controller\ConsoleController',
            'action'     => 'delete',
            'help'       => 'Delete a post'
        ],
        'help' => [
            'controller' => 'Tutorial\Controller\ConsoleController',
            'action'     => 'help',
            'help'       => 'Show this help screen'
        ],
        '*' => [
            'controller' => 'Tutorial\Controller\ConsoleController',
            'action'     => 'error'
        ]
    ],
    'services' => [
        'database' => [
            'call'   => 'Pop\Db\Db::connect',
            'params' => [
                'adapter' => 'Sqlite',
                'options' => [
                    'database' => __DIR__ . '/../../database/.htpoptutorial.sqlite'
                ]
            ]
        ]
    ]
];