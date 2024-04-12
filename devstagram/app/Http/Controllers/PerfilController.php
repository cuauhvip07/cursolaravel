<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Intervention\Image\ImageManager;

class PerfilController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('perfil.index');
    }

    use ValidatesRequests;  
    public function store(Request $request)
    {
        // not_in ayuda que el usuario no use esos usuarios restringidos 
        // 'in:cliente' forza a que el usuario use ese nombre de perfil y no puede escoger otro
        // El auth().. si tu tienes ese nombre, otra vez lo puedes tomar
        $this->validate($request,[
            'username'=>['required','max:30','unique:users,username,'.auth()->user()->id,'min:3','alpha_dash','not_in:twitter,editar-perfil'],
            'email'=>['email','unique:users,email,'.auth()->user()->id],
        ]);

        if($request->imagen){
            $imagen = $request->file('imagen');
            // uuid -> genera valores aleatorios
            $nombreImagen  = Str::uuid().  "."  .  $imagen->extension();

            // Creacion y lectura de la imagen
            $imagenServidor = ImageManager::imagick()->read($imagen);
            // Tamaño de 1000 w X 1000 h
            $imagenServidor->resize(1000,1000);
            // Creacion de la carpeta . Es emjor crearla desde el inicio
            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;
            // Guarda la imgagen donde se creo la carpeta
            $imagenServidor->save($imagenPath);
        }

        // Verificar si el password anterior es correcto
        if(auth()->attempt($request->only('password_old'))){
            return back()->with('mensaje','Password Incorrecto');
        }

        
        // Guardar cambios

        

        // Sirve para actualizar primero buscando el id y despues cambiando los valores
        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ??'';
        $usuario->email = $request->email;
        $usuario->password = $request->password ?? auth()->user()->password;

        $usuario->save();

        // Redireccionar al usuario 
        return redirect()->route('posts.index',$usuario->username);

    }
}
