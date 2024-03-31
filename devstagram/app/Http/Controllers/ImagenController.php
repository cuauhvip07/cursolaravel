<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\ImageManager;

class ImagenController extends Controller
{
    public function store(Request $request){

        $imagen = $request->file('file');
        // uuid -> genera valores aleatorios
        $nombreImagen  = Str::uuid().  "."  .  $imagen->extension();

        // Aqui empieza dando error 
        $imagenServidor = ImageManager::imagick()->read($imagen);
        $imagenServidor->resize(1000,1000);

        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        $imagenServidor->save($imagenPath);
        // Aqui termiina el error 


        return response()->json(['imagen' => $nombreImagen]);
    }
}
