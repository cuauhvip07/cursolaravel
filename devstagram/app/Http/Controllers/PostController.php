<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;

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

  // Siempre el store tendra el request ya que lo almacena en la bd
  use ValidatesRequests;  
  public function store(Request $request)
  {
    $this->validate($request,[
      'titulo'=>'required|max:255',
      'descripcion'=>'required',
      'imagen'=>'required'
    ]);
  }
}
