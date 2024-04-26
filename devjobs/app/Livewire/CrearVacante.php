<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use Livewire\Component;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    protected $rules = [  // Obligatoriamente debe de ser rules
        'titulo'=> 'required|string',
        'salario'=>'required',
        'categoria'=>'required',
        'empresa'=>'required',
        'ultimo_dia'=>'required',
        'descripcion'=>'required',
        'imagen'=>'required',

    ];

    public function crearVacante()
    {
        // Si pasa la validacion se pasa a $datos
        $datos = $this->validate(); // Aplica las reglas de arriba
    }

    public function render()
    {

        // Consultar la bd
    
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.crear-vacante',[
            'salarios'=>$salarios,
            'categorias'=>$categorias,
        ]);
    }
}
