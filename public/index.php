<?php

// Require autoloader
$autoloader = include __DIR__ . '/../vendor/autoload.php';

// Create main app object, register the app module and run the app
$app = new Pop\Application($autoloader, include __DIR__ . '/../app/config/app.web.php');
$app->register(new Tutorial\Module());
$app->run();
