@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{auth()->user()->username}}
@endsection


@section('contenido')
    <div class=" md:flex md:justify-center">
        <div class=" md:w-1/2 bg-white shadow p-6">
            <form action="{{route('perfil.store')}}" class="mt-10 md:mt-0" method="POST" enctype="multipart/form-data">
                @csrf
                <div class=" mb-5">
                    <label for="username" class=" mb-2 block uppercase text-gray-500 font-bold ">Username:</label>
                    <input 
                    type="text" 
                    name="username" 
                    id="username" 
                    placeholder="Tu nombre de usuario" 
                    class=" border p-3 w-full rounded-lg 
                    @error('username')
                    border-red-500 
                    @enderror"
                    value="{{(auth()->user()->username)}}">

                    @error('username')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class=" mb-5">
                    <label for="imagen" class=" mb-2 block uppercase text-gray-500 font-bold ">Imagen Perfil:</label>
                    <input 
                    type="file" 
                    name="imagen" 
                    id="imagen" 
                    class=" border p-3 w-full rounded-lg" 
                    accept=" .jpg, .jpeg, .png">
                </div>

                <div class=" mb-5">
                    <label for="email" class=" mb-2 block uppercase text-gray-500 font-bold ">Email</label>
                    <input 
                    type="email" 
                    name="email" 
                    id="email" 
                    placeholder="Tu email"
                    value="{{auth()->user()->email}}"
                    class=" border p-3 w-full rounded-lg
                    @error('email')
                        border-red-500
                    @enderror">
                </div>

                @error('email')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror


                <div class=" mb-5">
                    <label for="password_old" class=" mb-2 block uppercase text-gray-500 font-bold ">Ingrese password anterior</label>
                    <input 
                    type="password" 
                    name="password_old" 
                    id="password_old" 
                    placeholder="Password anterior"
                    class=" border p-3 w-full rounded-lg">
                </div>

                @if (session('mensaje'))
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ session('mensaje') }}</p>
                @endif

                <div class=" mb-5">
                    <label for="password" class=" mb-2 block uppercase text-gray-500 font-bold ">Ingrese password NUEVO</label>
                    <input 
                    type="password" 
                    name="password" 
                    id="password_new" 
                    placeholder="Password NUEVO"
                    class=" border p-3 w-full rounded-lg"
                    @error('password_new')
                        border-red-500
                    @enderror">
                </div>

                @error('password_new')
                    <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                @enderror
        
                <input type="submit" class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" value="Guardar Cambios">
            </form>
        </div>
    </div>
@endsection