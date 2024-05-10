<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class FiltrarVacantes extends Component
{
    // Pasar estos valores al componente padre que es el HomeVacante para que pueda buscar las vacantes dependiendo los criterios que se selccionen

    public $termino;
    public $salario;
    public $categoria;

    public function leerDatosFormulario()
    {
      // Para comunicarse con el padre se debe de ocupar dispatch()
      // Pasar el evento que se hace un dispatch
      $this->dispatch('terminosBusqueda', $this->termino, $this->categoria, $this->salario);
    }

    public function render()
    {

        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.filtrar-vacantes',[
            'salarios'=>$salarios,
            'categorias'=>$categorias
        ]);
    }
}
