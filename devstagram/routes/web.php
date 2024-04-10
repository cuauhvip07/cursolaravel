<?php

use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\LoggingController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

Route::get('/login',[LoggingController::class,'index'])->name('login');
Route::post('/login',[LoggingController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

// User es el modelo que tenemos 
Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index'); // URL dinamica
Route::get('posts/create',[PostController::class, 'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/{user:username}/post/{post}',[PostController::class,'show'])->name('posts.show');
Route::post('/{user:username}/post/{post}',[ComentarioController::class,'store'])->name('comentarios.store');
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');


// like a las fotos
Route::post('/post/{post}/likes',[LikeController::class,'store'])->name('posts.likes.store');
Route::delete('/post/{post}/likes',[LikeController::class,'destroy'])->name('posts.likes.destroy');