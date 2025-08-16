<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Dotenv\Dotenv;

$app = Application::configure(basePath: dirname(__DIR__));

// 🔹 Custom env file loader
$envFile = '.env.' . ($_SERVER['APP_ENV'] ?? 'local');
if (file_exists(dirname(__DIR__) . '/' . $envFile)) {
    Dotenv::createImmutable(dirname(__DIR__), $envFile)->safeLoad();
} else {
    // fallback to default .env
    Dotenv::createImmutable(dirname(__DIR__))->safeLoad();
}

return $app
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })
    ->create();
