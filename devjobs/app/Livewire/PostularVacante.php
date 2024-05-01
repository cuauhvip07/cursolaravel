<?php

namespace App\Livewire;

use Livewire\Component;

class PostularVacante extends Component
{
    public $cv;

    protected $rules = [
        'cv'=>'required|mimes:pdf',
    ];

    public function postularme()
    {
        $this->validate();

        // Almacenar cv

        // Crear la vacante

        // Crear notificacion y email

        // Mostar al usiario un mensaje de ok
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
