<?php

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

Route::get('/muro',[PostController::class,'index'])->name('posts.index');


