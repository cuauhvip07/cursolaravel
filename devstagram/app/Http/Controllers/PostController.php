<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PostController extends Controller
{    
    // Proteger la ruta si no esta autenticado
    public function __construct()
    {
       
        $this->middleware('auth');
    }
    
    public function index()
    {
      return view('dashboard');
    }
}
