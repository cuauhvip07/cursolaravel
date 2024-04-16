@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection

@section('contenido')
    {{-- listar-post es el nombre del la vista que tenemos en el componente  --}}
    {{-- nombre de la variable como quieres que se llame, la segunda es la variable de php que viene del controlador de home, despues se le debe de añadir esa variable al componente en este caso es ListarPost.php --}}
   <x-listar-post :posts="$posts" />

   {{-- Se puede reutilizar el mismo template  --}}
   {{-- <x-listar-post >
    {{-- lo que se coloque aqui dentro se pasa al template de listar-post  --}}
        {{-- <h1>Hola desde el home</h1> --}}
   {{-- </x-listar-post> --}} 

   
@endsection