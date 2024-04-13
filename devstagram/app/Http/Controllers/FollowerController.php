<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class FollowerController extends Controller
{
    public function store(User $user)
    {
        // El $user->username es del perfil que estas visitando, NO el que esta logeado
        // // follower es de la relacion, esta en el modelo User
        // attach sirve en relaciones muchos a muchos que se relacionan con la misma tabla
        $user->followers()->attach( auth()->user()->id);
        return back();
    }

    public function destroy(User $user)
    {
        $user->followers()->detach( auth()->user()->id);
        return back();
    }
}
