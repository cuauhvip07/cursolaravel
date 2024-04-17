<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    // Ya no es necesario con livewire 
    // public function store(Request $request, Post $post)
    // {
    //     // user() es el usuario autenticado
    //     $post->likes()->create([
    //         'user_id'=>$request->user()->id
    //     ]);

    //     return back();
    // }

    // public function destroy(Request $request, Post $post)
    // {
    //     // likes() viene del modelo de User de la funcion de likes()
    //     $request->user()->likes()->where('post_id',$post->id)->delete();
    //     return back();
    // }
}
