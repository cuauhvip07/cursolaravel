@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection

@section('contenido')
    {{-- listar-post es el nombre del la vista que tenemos en el componente  --}}
   <x-listar-post >
    {{-- lo que se coloque aqui dentro se pasa al template de listar-post  --}}
        <h1>Hola desde el home</h1>
        <x-slot:title>
            <header>Este es un</header>
       </x-slot:title>
   </x-listar-post>

   {{-- Se puede reutilizar el mismo template  --}}
   {{-- <x-listar-post >
        <h1>Hola desde el home</h1>
   </x-listar-post> --}}

   <x-listar-post >
       
        <h1>Hola desde el home</h1>
   </x-listar-post>
@endsection