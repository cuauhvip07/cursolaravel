<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class HomeVacantes extends Component
{

    public $termino;
    public $salario;
    public $categoria;

    // Poner los elementos que se van a escuchar por un evento, el evento tambien se cuentra en FiltrarVacante
    // Cuando ocurre el evento de terminos busqueda manda a llamr la funcion de buscar 
    protected $listenrs = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino,$categoria,$salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
       
    }
   
    public function render()
    {
        
        $vacantes = Vacante::all();
        
        return view('livewire.home-vacantes',[
            'vacantes'=>$vacantes,
        ]);
    }
}
