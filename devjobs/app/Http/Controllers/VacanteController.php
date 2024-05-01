<?php

namespace App\Http\Controllers;

use App\Models\Vacante;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller; // Esta para edit
use Illuminate\Support\Facades\Gate; // Esta para edit



class VacanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Cuando en el policy no esta la instancia de un modelo, se lo debes de pasar en este caso se le pasa la Vacante
        // Vacante previene el acceso a todo lo relacionado a ese modelo
        if(Gate::allows('viewAny',Vacante::class)){
            return view('vacantes.index');
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(Gate::allows('create',Vacante::class)){
            return view('vacantes.create');
        }
       
    }


    /**
     * Display the specified resource.
     */
    public function show( Vacante $vacante)
    {
        return view('vacantes.show',[
            'vacante'=>$vacante
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vacante $vacante){
 
        // Se debe de importar las librerias que ponga arriba
        // ::allows es para dejar para el usuario en caso de que la funcion 'update' del Policy se cumpla
        if (Gate::allows('update', $vacante)){
            return view('vacantes.edit', [
                'vacante' => $vacante
            ]);
        }else{
            return redirect()->route('vacantes.index');
        }
    }

}
