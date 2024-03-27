<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    // Cerrar la sesion
    // logout-> helper ayuda a cerra la sesion
    public function store()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
