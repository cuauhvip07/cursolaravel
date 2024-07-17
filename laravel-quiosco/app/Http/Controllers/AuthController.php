<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\RegistroRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    // Se manda a llamar el request por su nombre
    public function register(RegistroRequest $request){
        // Valida el registro
        $data = $request->validated();

        // Crear el usuario cuando pase la validacion de arriba
        $user = User::create([
            'name'=>$data['name'],
            'email'=>$data['email'],
            'password'=> bcrypt($data['password'])

        ]);

        // Retornar una respuesta 
        return [
            // En token que esta en parentesis se puede llamar como uno desee
            'token'=> $user->createToken('token')->plainTextToken,
            'user'=>$user
        ];
    }

    public function login(LoginRequest $request){
        $data = $request->validated();

        // Revisar el password
        if(!Auth::attempt($data)){
            return response([
                'errors'=>['El email o el password son incorrectos']
            ],422); // Se debe de retornar el codigo del error
        }

        // Autenticar el usuario
    }

    public function logout(Request $request){

    }
}
