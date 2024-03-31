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

        // Creacion y lectura de la imagen
        $imagenServidor = ImageManager::imagick()->read($imagen);
        // Tamaño de 1000 w X 1000 h
        $imagenServidor->resize(1000,1000);
        // Creacion de la carpeta . Es emjor crearla desde el inicio
        $imagenPath = public_path('uploads') . '/' . $nombreImagen;
        // Guarda la imgagen donde se creo la carpeta
        $imagenServidor->save($imagenPath);
        

        return response()->json(['imagen' => $nombreImagen]);
    }
}
