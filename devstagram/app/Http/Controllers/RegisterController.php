<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RegisterController extends Controller
{
    //
    public function index() 
    {
        return view('auth.register');
    }

    use ValidatesRequests;

    public function store(Request $request)
    {

        // Modificar el request -> se debe de hacer lo menos posible
        // $request->$request->add(['username' => Str::slug($request->username)]);

        // Validacion
        $this->validate($request,[
            'name'=>'required|max:30',
            'username'=>'required|max:30|unique:users,username|min:3|alpha_dash',
            'email'=>'required|email|unique:users|max:60',
            'password'=>'required|confirmed|min:5'
        ]);

        // Equivalente a INSERT INTO
        User::create([
            'name'=>$request->name,
            'username'=>Str::lower($request->username), 
            'email'=>$request->email,
            'password'=>Hash::make($request->password) // hashear password pero ya no es necesario
        ]);

        // Autenticar un usuario
        // auth() -> Autentica un suario : attempt() -> Intentar autenticar usuario
        // auth()->attempt([
        //     'email'=>$request->email,
        //     'password'=>$request->password
        // ]);

        // Otra forma de autenticar
        auth()->attempt($request->only('email','password'));

        // Redireccionar al usuario
        return redirect()->route('posts.index');
    }
}
