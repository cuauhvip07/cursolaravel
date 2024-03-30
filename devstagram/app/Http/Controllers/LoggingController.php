<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class LoggingController extends Controller
{
    public function index(){
        return view('auth.logging');
    }

    // Request -> Informacion del formulario
    use ValidatesRequests;
    public function store(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

       

        //back()-> Volver a la pagina anterior
        // with()-> Mnadar un mensaje y consumirlo en la vista

        if(!auth()->attempt($request->only('email','password'),$request->remember)){
            return back()->with('mensaje','Credenciales Incorrectas');
        }

        return redirect()->route('posts.index', [
            auth()->user()->username,
            // auth()->user()->name
        ]);
    }
}
