<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    
    // Se manda a llamar el request por su nombre
    public function register(RegistroRequest $request){
        // Valida el registro
        $data = $request->validate();
    }

    public function login(Request $request){
        
    }

    public function logout(Request $request){

    }
}
