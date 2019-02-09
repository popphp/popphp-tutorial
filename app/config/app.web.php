<?php

return [
    'routes'   => [
        '/' => [
            'controller' => 'Tutorial\Controller\IndexController',
            'action'     => 'index'
        ],
        '/post' => [
            'controller' => 'Tutorial\Controller\IndexController',
            'action'     => 'post'
        ],
        '*' => [
            'controller' => 'Tutorial\Controller\IndexController',
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