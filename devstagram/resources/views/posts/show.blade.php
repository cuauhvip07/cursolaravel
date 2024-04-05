@extends('layouts.app');

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class=" container mx-auto flex">
        <div class=" md:w-1/2">
            <img src="{{asset('uploads').'/'.$post->imagen}}" alt="Imagen del post {{$post->titulo}}">

            <div class="p-3">
                <p>0 Likes</p>
            </div>

            <div class=" ">
                {{-- post es del route model bounding , user viene de la realcion de Post ya que asi se llama la funcion y username es del nombre del usuario  --}}
                <p class=" font-bold">{{$post->user->username}}</p>
 {{-- Carbon -> libreria integrada que ayuda a ponernos las fechas para humanos --}}
                <p class=" text-sm text-gray-500">{{$post->created_at->diffForHumans()}}</p>
                <p class="mt-5">{{$post->descripcion}}</p>
            </div>
        </div>

        <div class=" md:w-1/2">
            2
        </div>
    </div>
@endsection