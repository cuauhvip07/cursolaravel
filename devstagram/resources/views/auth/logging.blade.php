@extends('layouts.app')

@section('titulo')
    Inicia Sesion en Devstagram
@endsection

@section('contenido')
    <div class=" md:flex md:justify-center md:gap-10 md:items-center">
        <div class=" md:w-6/12 p-5">
            <img src="{{asset('img/login.jpg')}}" alt="Imagen login de usuario">
        </div>

        <div class=" md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{route('login')}}" novalidate>
                @csrf

                @if (session('mensaje'))
                <p class=" p-2 my-2 bg-red-500 text-center text-white text-sm rounded-lg">
                    {{ session('mensaje') }}
                </p>
                @endif

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

                <div class=" mb-5">
                    <input type="checkbox" name="remember">
                    <label class=" text-gray-500 ">Mantener mi Sesión Abierta</label>
                </div>

                <input type="submit" class=" bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" value="Iniciar Sesión">
            </form>
        </div>
    </div>
@endsection