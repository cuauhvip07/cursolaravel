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

        // Limpiar notificaciones
        auth()->user()->unreadNotifications->markAsRead();

        // Se pasa la informacion a la vista
        return view('notificaciones.index',[
            'notificaciones'=>$notificaciones,
        ]);
    }
}
