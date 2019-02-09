<?php

return [
    'routes'   => [
        'help' => [
            'controller' => 'Tutorial\Controller\ConsoleController',
            'action'     => 'help'
        ],
        'show' => [
            'controller' => 'Tutorial\Controller\ConsoleController',
            'action'     => 'show'
        ],
        'delete' => [
            'controller' => 'Tutorial\Controller\ConsoleController',
            'action'     => 'delete'
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