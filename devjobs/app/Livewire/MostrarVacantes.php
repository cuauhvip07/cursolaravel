<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{

     // Las funciones que van a escuchar por un evento
    protected $listeners = ['eliminarVacante'];

    public function eliminarVacante( $id)
    {
        $vacante = Vacante::find($id['vacante_id']);
        $vacante->delete();
    }

    // Forma numero uno para comunicar con el componente de la vista de livewire 

   

    // // funcion que se manda desde la vista del boton
    // public function prueba($vacante_id)
    // {
    //     dd($vacante_id);
    // }

    public function render()
    {
        $vacantes = Vacante::where('user_id',auth()->user()->id)->paginate(10);

        return view('livewire.mostrar-vacantes',[
            'vacantes'=>$vacantes
        ]);
    }
}
