<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{    
  // Proteger la ruta si no esta autenticado
  public function __construct()
  {
      
      $this->middleware('auth');
  }

  // Importar el modelo User
  // $user tiene la informacion de la bd con los datos
  public function index(User $user)
  {
    
    // dd($user->username);
    return view('dashboard',[
      'user'=>$user
    ]);
  }

  public function create()
  {
    return view('posts.create');
  }
}
