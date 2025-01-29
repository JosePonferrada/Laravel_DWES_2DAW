<?php

use App\Http\Middleware\MGlobal;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Agregamos el middleware global
        //$middleware->append([MGlobal::class]);
        // Le asignamos un alias al middleware
        $middleware->alias(['mayor' => \App\Http\Middleware\MayorEdad::class]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
