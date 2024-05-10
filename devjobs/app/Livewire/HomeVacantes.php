<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;
use Livewire\WithPagination;

class HomeVacantes extends Component
{
    use WithPagination;

    public $termino;
    public $salario;
    public $categoria;

    // Poner los elementos que se van a escuchar por un evento, el evento tambien se cuentra en FiltrarVacante
    // Cuando ocurre el evento de terminos busqueda manda a llamr la funcion de buscar 
    protected $listeners = ['terminosBusqueda' => 'buscar'];

    public function buscar($termino,$categoria,$salario)
    {
        $this->termino = $termino;
        $this->categoria = $categoria;
        $this->salario = $salario;
       
    }
   
    public function render()
    {
        
        // $vacantes = Vacante::all();
        
        // En laravel si utilizas where es por que un valor SI existe
        // When se ejecuta solamente en EN CASO DE QUE EXISTA

        $vacantes = Vacante::when($this->termino , function($query){
            $query->where('titulo','LIKE', "%" . $this->termino . "%");
        }) 
        // se ocupa el orWhere en caso de que no este el titulo, lo busca por empresa
        ->when($this->termino, function ($query){
            $query->orWhere('empresa', 'LIKE', "%" .$this->termino . "%");
        })
        ->when($this->categoria, function ($query){
            $query->where('categoria_id', $this->categoria);
        })
        ->when($this->salario, function ($query){
            $query->where('salario_id', $this->salario);
        })
        ->paginate(20);

        return view('livewire.home-vacantes',[
            'vacantes'=>$vacantes,
        ]);
    }
}
