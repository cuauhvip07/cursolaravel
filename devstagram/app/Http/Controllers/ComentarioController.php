<?php

namespace App\Http\Controllers;

use App\Models\comentario;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ComentarioController extends Controller
{
    //
    use ValidatesRequests;  
    public function store (Request $request,User $user, Post $post)
    {
        // Validar
        $this->validate($request,[
            'comentario' => 'required|max:255'
        ]);

        // Almacenar resultado  Se manda a llamar el modelo de comentario
        comentario::create([
            'user_id'=> auth()->user()->id,
            'post_id'=> $post->id,
            'comentario' => $request->comentario
        ]);

        // Imprimir mensaje
        // whit son mensaje que se imprimen con una sesion en la vista
        return back()->with('mensaje','Comentario realizado correctacmente');
    }
}
