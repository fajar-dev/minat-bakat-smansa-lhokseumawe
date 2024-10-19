<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\isCompletedUser;
use App\Http\Middleware\notCompletedUser;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'isCompletedUser' => isCompletedUser::class,
            'notCompletedUser' => notCompletedUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
