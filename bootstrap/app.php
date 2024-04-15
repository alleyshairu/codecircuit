<?php

use Illuminate\Foundation\Application;
use Uc\Module\Core\Middleware\AdminMiddleware;
use Uc\Module\Core\Middleware\StudentMiddleware;
use Uc\Module\Core\Middleware\TeacherMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Uc\Module\Core\Middleware\RedirectIfAuthenticatedMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'guest' => RedirectIfAuthenticatedMiddleware::class,
            'student' => StudentMiddleware::class,
            'teacher' => TeacherMiddleware::class,
            'admin' => AdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
    })->create();
