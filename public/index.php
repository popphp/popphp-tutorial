<?php

require_once __DIR__  . '/../vendor/autoload.php';

// Create the app, loading the config file
$app = new Tutorial\Application(
    include __DIR__ . '/../app/config/application.web.php'
);

// Run the app
$app->run();
