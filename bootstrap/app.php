<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Dotenv\Dotenv;

// ✅ detect APP_ENV and load correct .env file before app creates
$envFile = '.env.' . ($_SERVER['APP_ENV'] ?? 'production');
if (file_exists(dirname(__DIR__) . '/' . $envFile)) {
    Dotenv::createImmutable(dirname(__DIR__), $envFile)->safeLoad();
} else {
    Dotenv::createImmutable(dirname(__DIR__))->safeLoad();
}

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
