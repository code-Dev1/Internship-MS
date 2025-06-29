<?php

use App\Http\Middleware\Localization;
use App\Http\Middleware\roleMiddleware;
use App\Http\Middleware\SettingMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web(append: [
            Localization::class,
        ]);
        $middleware->web(append: [
            SettingMiddleware::class,
        ]);
        $middleware->alias([
            'role' => roleMiddleware::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
