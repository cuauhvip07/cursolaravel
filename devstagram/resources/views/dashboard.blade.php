@extends('layouts.app')

@section('titulo')
    Perfil: {{$user->username}}
@endsection

@section('contenido')

    <div class=" flex justify-center">
        <div class=" w-full md:w-8/12 lg:w-6/12 flex flex-col items-center md:flex-row">
            <div class=" w-8/12 lg:w-6/12 px-5">
                <img src="{{ asset('img/usuario.svg')}}" alt="Imagen usuario">
            </div>
            <div class=" md:w-8/12 lg:w-6/12 px-5 flex flex-col md:items-start md:justify-center items-center py-10 md:py-10">

                <p class=" text-gray-700 text-2xl mb-3">{{ $user->name }}</p>

                <p class=" text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class=" font-normal"> Seguidores</span>
                </p>

                <p class=" text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class=" font-normal"> Siguiendo</span>
                </p>

                <p class=" text-gray-800 text-sm mb-3 font-bold">
                    0
                    <span class=" font-normal"> Posts</span>
                </p>
            </div>
        </div>
    </div>

    <section class=" container mx-auto mt-10">
        <h2 class="text-4xl text-center font-black my-10">Publicaciones</h2>
        {{-- {{dd($user->posts)}} posts es la relacion que hay en usuario --}}
        <!--count() nos dice si existe al menos un valor-->
        @if ($posts->count())  {{-- if($user->posts->count()) --}}
            <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($posts as $post)
                    <div>
{{-- Se le debe de agregar $post que viene del arreglo para que se pase al router --}}
                        <a href="{{ route('posts.show',['post'=>$post,'user'=>$user]) }}">
                            <img src="{{asset('uploads') . "/" . $post->imagen}}" alt="Imagen del post {{$post->titulo}}">
                        </a>
                    </div>    
                @endforeach
            </div>

            <div class="my-10">
                <!-- Paginacion-->
                {{$posts->links()}}
            </div>
        @else
            <p class=" text-gray-600 uppercase text-sm text-center font-bold">No hay Posts</p>
        @endif
    </section>
    
@endsection