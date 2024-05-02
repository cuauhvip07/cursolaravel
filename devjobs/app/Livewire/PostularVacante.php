<?php

namespace App\Livewire;

use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;

    protected $rules = [
        'cv'=>'required|mimes:pdf',
    ];

    public function mount(Vacante $vacante)
    {
        // La vacante se lo trae de la vista de postular-vacante y se pasa a este Livewire
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        // Almacenar cv

        $datos = $this->validate(); // Aplica las reglas de arriba

        // $this hace referencia a las propiedades que estan arriba
        // Almacenar la imagen
        $cv = $this->cv->store('public/cv');
        // str_replace te remplaza el 'public/vacantes que viene como prefijo en la imagen y lo ponemos en ''
        $datos['cv'] = str_replace('public/cv/','',$cv);

        // Crear candidato a la vacante
        // Ya no es necesario la vacante_id gracias a la relacion que estamos mandando a llamar
        $this->vacante->candidatos()->create([
            'user_id'=>auth()->user()->id,
            'cv'=>$datos['cv'],
        ]);


        // Crear notificacion y email
        // notify toma como parametro la notificacion que quieras usar en este caso es la que se creo de NuevoCandidato
        // En el construdctor se pasa los datos que se quieran pasar
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo , auth()->user()->id));

        // Mostar al usiario un mensaje de ok
        session()->flash('mensaje','Se envio la información correctamente, mucha suerte');
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
