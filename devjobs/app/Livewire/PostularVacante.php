<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;

    protected $rules = [
        'cv'=>'required|mimes:pdf',
    ];

    public function postularme()
    {
        // Almacenar cv

        $datos = $this->validate(); // Aplica las reglas de arriba

        // $this hace referencia a las propiedades que estan arriba
        // Almacenar la imagen
        $cv = $this->cv->store('public/cv');
        // str_replace te remplaza el 'public/vacantes que viene como prefijo en la imagen y lo ponemos en ''
        $datos['imagen'] = str_replace('public/cv/','',$cv);

        // Crear la vacante

        // Crear notificacion y email

        // Mostar al usiario un mensaje de ok
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
