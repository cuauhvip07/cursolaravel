<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class NotificacionController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        // unreadsNotifications son las notificaciones que no se han visto
        $notificaciones = auth()->user()->unreadNotifications;
        return view('notificaciones.index',[
            'notificaciones'=>$notificaciones,
        ]);
    }
}
