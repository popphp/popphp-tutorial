<?php

return [
    'routes'   => include 'routes.web.php',
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