<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        // Validacion
        $this->validate($request,[
            'name'=>'required|max:30',
            'username'=>'required|max:30|unique:users|min:3',
            'email'=>'required|email|unique:users|max:60',
            'password'=>'required|confirmed|min:5'
        ]);

        dd('Crenado usuario');
    }
}
