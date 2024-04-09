@extends('layouts.app');

@section('titulo')
    {{$post->titulo}}
@endsection

@section('contenido')
    <div class=" container mx-auto md:flex">
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

                    @if (session('mensaje'))
                        <div class=" bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">{{session('mensaje')}}</div>
                    @endif
                    
                    <form action="{{ route('comentarios.store',['post'=>$post,'user'=>$user])}}" method="POST">
                        @csrf
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

                    <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
                        {{-- Desde el modelo de post se manda a llamar la funcion de comentarios que es la asociacion que tiene con post --}}
                        @if ($post->comentarios->count())
                            @foreach ($post->comentarios as $comentario)
                                <div class="p-5 border-gray-300 border-b">
                                    {{-- El comentario->user->username viene de la relacion de comentario --}}
                                    <a href="{{route('posts.index', $comentario->user)}}" class="font-bold">{{$comentario->user->username}}</a>
                                      {{-- El segundo comentario es el nombre de la columna de la bd --}}
                                    <p>{{$comentario->comentario}}</p>
                                    <p class="text-sm text-gray-500">{{$comentario->created_at->diffForHumans()}}</p>
                                </div>
                            @endforeach
                        @else
                            <p class="p-10 text-center">No hay comentarios aún</p>
                        @endif
                    </div>

            </div>
        </div>
    </div>
@endsection