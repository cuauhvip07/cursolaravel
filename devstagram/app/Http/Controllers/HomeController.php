<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    // __invoke es el primero que se manda a llamar, es bueno cuando solo es un metodo
    public function __invoke()
    {
        // Obtener a quienes seguimos 
        // followings viene de la funcion del modelo User
        // pluck('id') se trae el id  -> toArray() te lo convierte en arreglo
        $ids = auth()->user()->followings->pluck('id')->toArray();
        // Se hace una busqueda
        // whereIn verifica que u valor contenga los valores que le pasas, en este caso es user_id
        $posts = Post::whereIn('user_id',$ids)->latest()->paginate(20);


        return view('home',[
            'posts'=>$posts
        ]);
    }
}
