<?php

require_once __DIR__  . '/../vendor/autoload.php';

// Calculate and define the base path
$basePath = str_replace([realpath($_SERVER['DOCUMENT_ROOT']), '\\'], ['', '/'], realpath(__DIR__));
define('BASE_PATH', (!empty($basePath) ? $basePath : ''));

// Create the app, loading the config file
$app = new Tutorial\Application(
    include __DIR__ . '/../app/config/application.web.php'
);

// Run the app
$app->run();
