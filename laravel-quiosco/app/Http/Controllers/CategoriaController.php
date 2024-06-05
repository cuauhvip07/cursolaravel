<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoriaCollection;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        // Una manera de respuesta tipo json
        // return response()->json(['categorias' => Categoria::all()]);
        
        // Otra manera de tipo json pero con Resource
        return new CategoriaCollection(Categoria::all());
    }
}
