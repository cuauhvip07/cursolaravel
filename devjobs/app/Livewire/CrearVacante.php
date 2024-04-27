<?php

namespace App\Livewire;

use App\Models\Categoria;
use App\Models\Salario;
use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearVacante extends Component
{

    public $titulo;
    public $salario;
    public $categoria;
    public $empresa;
    public $ultimo_dia;
    public $descripcion;
    public $imagen;

    // Subida de archivos
    use WithFileUploads;

    protected $rules = [  // Obligatoriamente debe de ser rules
        'titulo'=> 'required|string',
        'salario'=>'required',
        'categoria'=>'required',
        'empresa'=>'required',
        'ultimo_dia'=>'required',
        'descripcion'=>'required',
        'imagen'=>'required|image|max:1024',

    ];

    public function crearVacante()
    {
        // Si pasa la validacion se pasa a $datos
        $datos = $this->validate(); // Aplica las reglas de arriba

        // $this hace referencia a las propiedades que estan arriba
        // Almacenar la imagen
        $imagen = $this->imagen->store('public/vacantes');
        // str_replace te remplaza el 'public/vacantes que viene como prefijo en la imagen y lo ponemos en ''
        $datos['imagen'] = str_replace('public/vacantes/','',$imagen);
        
        // Crear la vacante
        Vacante::create([
            // $datos es de la variable que nos retorna la info cuando pasa la validacion
            'titulo' => $datos['titulo'],
            'salario_id'=>$datos['salario'],
            'categoria_id'=>$datos['categoria'],
            'empresa'=>$datos['empresa'],
            'ultimo_dia'=>$datos['ultimo_dia'],
            'descripcion'=>$datos['descripcion'],
            'imagen'=>$datos['imagen'],
            'user_id'=>auth()->user()->id,
        ]);

        // Crear un mensaje
        session()->flash('mensaje','La vante se publico correctamente');
        // Redireccionar al usuario
        return redirect()->route('vacantes.index');
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
