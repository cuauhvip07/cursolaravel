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

        <div class=" md:w-1/2 p-5">
            <div class=" shadow bg-white p-5 mb-5">
                @auth
                    <p class="text-xl font-bold text-center mb-4"> Agrega un nuevo comentario</p>
                    <form action="">
                        <div class=" mb-5">
                            <label for="comentario" class=" mb-2 block uppercase text-gray-500 font-bold ">Añade un Comentario:</label>
                            <textarea
                            name="comentario" 
                            id="comentario" 
                            placeholder="Agrega un Comentario" 
                            class=" border p-3 w-full rounded-lg 
                            @error('comentario')
                            border-red-500 
                            @enderror"></textarea>
        
                            @error('comentario')
                                <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="submit" class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" value="Comentar">
                    </form>
                @endauth
            </div>
        </div>
    </div>
@endsection