@extends('layouts.app')

@section('titulo')
    Registrate en Devstagram
@endsection

@section('contenido')
    <div class=" md:flex md:justify-center md:gap-10 md:items-center">
        <div class=" md:w-6/12 p-5">
            <img src="{{asset('img/registrar.jpg')}}" alt="Imagen registro de usuario">
        </div>

        <div class=" md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{route('register')}}" method="POST" novalidate>
                @csrf
                <div class=" mb-5">
                    <label for="name" class=" mb-2 block uppercase text-gray-500 font-bold ">Nombre:</label>
                    <input 
                    type="text" 
                    name="name" 
                    id="name" 
                    placeholder="Tu nombre" 
                    class=" border p-3 w-full rounded-lg 
                    @error('name')
                    border-red-500 
                    @enderror"
                    value="{{old('name')}}">

                    @error('name')
                        <p class=" bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                </div>

                <div class=" mb-5">
                    <label for="username" class=" text-gray-500 mb-2 block uppercase font-bold">Username</label>
                    <input 
                    name="username"
                    id="username"
                    type="text" 
                    class=" border p-3 rounded-lg w-full
                    @error('username')
                     border-red-500
                    @enderror"
                    placeholder="Tu nombre de Usuario"
                    value="{{old('username')}}">
                    @error('username')
                        <p class=" text-white bg-red-500 p-2 text-center text-sm rounded-lg my-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class=" mb-5">
                    <label for="email" class=" text-gray-500 font-bold uppercase block mb-2">Email:</label>
                    <input 
                    type="email"
                    id="email"
                    name="email"
                    class=" w-full p-3 border rounded-lg
                    @error('email')
                     border-red-500
                    @enderror"
                    placeholder="Tu Email"
                    value="{{old('email')}}">
                    @error('email')
                        <p class=" p-2 my-2 bg-red-500 text-center text-white text-sm rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password" class=" text-gray-500 font-bold uppercase mb-2 block">Password:</label>
                    <input 
                    type="password" 
                    name="password" 
                    id="password"
                    class=" w-full border rounded-lg p-3
                    @error('password')
                    border-red-500
                    @enderror"
                    placeholder="Tu password">
                    @error('password')
                        <p class=" p-2 my-2 bg-red-500 text-center text-white text-sm rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-5">
                    <label for="password_confirmation" class=" text-gray-500 font-bold uppercase mb-2 block">Repetir Password:</label>
                    <input 
                    type="password" 
                    name="password_confirmation" 
                    id="password_confirmation"
                    class=" w-full border rounded-lg p-3
                    @error('password_confirmation')
                    border-red-500
                    @enderror"
                    placeholder="Confirmar password">
                    @error('password_confirmation')
                        <p class=" p-2 my-2 bg-red-500 text-center text-white text-sm rounded-lg">{{ $message }}</p>
                    @enderror
                </div>

                <input type="submit" class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" value="Crear cuenta">
            </form>
        </div>
    </div>
@endsection