<?php

return [
    'routes'   => [
        'help' => [
            'controller' => 'Tutorial\Controller\ConsoleController',
            'action'     => 'help',
            'default'    => true
        ],
        'show' => [
            'controller' => 'Tutorial\Controller\ConsoleController',
            'action'     => 'show'
        ],
        'delete' => [
            'controller' => 'Tutorial\Controller\ConsoleController',
            'action'     => 'delete'
        ]
    ],
    'services' => [
        'database' => [
            'call'   => 'Pop\Db\Db::connect',
            'params' => [
                'adapter' => 'Sqlite',
                'options' => [
                    'database' => __DIR__ . '/../database/.htpoptutorial.sqlite'
                ]
            ]
        ]
    ]
];