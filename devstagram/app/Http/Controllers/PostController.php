<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(){
        // auth() -> Te dice que usuario esta auteticado
        dd(auth()->user());
    }
}
