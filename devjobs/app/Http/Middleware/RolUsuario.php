<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RolUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // dd(auth()->user()->rol); Esta es una manera de hacerlo 
        if($request->user()->rol === 1){
            // En caso de no ser el rol 2 redirrecionar el usuario hacia home
            return redirect()->route('home');
        }
        return $next($request);
    }
}
