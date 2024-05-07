<?php

use App\Http\Middleware\RolUsuario;
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
        //
    }) 
    // Creación de un middleware 
    // puedes ocupar un mismo nombre para que corran dos a la vez por ejemplo llamarlo verified y corren ambos porocesos a la vez pero si quires crear uno desde cero debe s de cambiarle el nombre
    ->withMiddleware(function (Middleware $middleware){
        $middleware->alias([
            'rol.reclutador'=>RolUsuario::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
