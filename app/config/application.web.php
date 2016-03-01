<?php

return [
    'routes'   => [
        '/' => [
            'controller' => 'Tutorial\Controller\IndexController',
            'action'     => 'index',
            'default'    => true
        ],
        '/post' => [
            'controller' => 'Tutorial\Controller\IndexController',
            'action'     => 'post'
        ]
    ],
    'services' => [
        'database' => [
            'call'   => 'Pop\Db\Db::connect',
            'params' => [
                'adapter' => 'Sqlite',
                'options' => [
                    'database' => __DIR__ . '/../data/.htpoptutorial.sqlite'
                ]
            ]
        ]
    ]
];