<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;

class AuthController extends Controller
{
    
    // Se manda a llamar el request por su nombre
    public function register(RegistroRequest $request){
        // Valida el registro
        $data = $request->validated();

        // Crear el usuario
        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=> bcrypt($data['password'])

        ]);

        // Retornar una respuesta 
        return [
            'token'=> $user->createToken('token')->plainTextToken,
            'user'=>$user
        ];
    }

    public function login(Request $request){
        
    }

    public function logout(Request $request){

    }
}
