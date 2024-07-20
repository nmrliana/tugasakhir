<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/system/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloadersystem.
require __DIR__.'/system/vendor/autoload.php';

// Bootstrap Laravel and handle the requestsystem.
(require_once __DIR__.'/system/bootstrap/app.php')
    ->handleRequest(Request::capture());
