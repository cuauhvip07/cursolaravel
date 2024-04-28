<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Illuminate\Support\Carbon;
use Livewire\Component;

class EditarVacante extends Component
{

    public $id;
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

    ];

    public function mount(Vacante $vacante)
    {
        $this->id = $vacante->id;
        $this->titulo = $vacante->titulo;
        $this->salario = $vacante->salario_id;
        $this->categoria = $vacante->categoria_id;
        $this->empresa = $vacante->empresa;
        $this->ultimo_dia = Carbon::parse($vacante->ultimo_dia)->format('Y-m-d'); // parsear la fecha
        $this->descripcion = $vacante->descripcion;
        $this->imagen = $vacante->imagen;
    }

    public function editarVacante()
    {

        // Validar los campos y contiene la informacion del formulario
        $datos = $this->validate();

        // Cheacar si hay una nueva imagen

        //Encontrar la vacante a editar
        $vacante = Vacante::find($this->id);

        // Asignar los valores
        $vacante->titulo = $datos['titulo'];
        $vacante->salario_id = $datos['salario'];
        $vacante->categoria_id = $datos['categoria'];
        $vacante->empresa = $datos['empresa'];
        $vacante->ultimo_dia = $datos['ultimo_dia'];
        $vacante->descripcion = $datos['descripcion'];

        // Guardar la vacante
        $vacante->save();
        // Redireccionar
        session()->flash('mensaje','La vacante se actualizo correctamente');
        return redirect()->route('vacantes.index');
    }

    public function render()
    {

        // Codigo para mostrear los salarios y cateogias en la vista
        $salarios = Salario::all();
        $categorias = Categoria::all();

        return view('livewire.editar-vacante',[
            'salarios'=>$salarios,
            'categorias'=>$categorias,
        ]);
    }
}
