<?php

namespace App\Livewire;

use Livewire\Component;

class LikePost extends Component
{

    public $post;
    public $isLiked;
    public $likes;

    public function render()
    {
        return view('livewire.like-post');
    }

    // mount sr manda a llamar automaticamente 
    public function mount($post)
    {
        // Checamos si ya le dio like y el $isLiked es un bool entonces se pasa a la vista
        $this->isLiked = $post->checkLike(auth()->user()); 
        $this->likes = $post->likes->count();
    }

    public function like(){

        //  Manda a llamar la funcion del Modelo Post y verifica que este autenticado y no repetir likes del mismo usuario
        if($this->post->checkLike(auth()->user())){
            // Aqui ya le dio like el usuario, entonces si le da clik de nuevo es para eliminar el like, por eso se ocupa este codigo 
           $this->post->likes()->where('post_id',$this->post->id)->delete();
           $this->isLiked = false;
           $this->likes--;
        }else{
            // Para darle like
            $this->post->likes()->create([
                'user_id'=>auth()->user()->id
            ]);
            $this->isLiked = true; // Cambia el color pero debemos de poner esto para que haga los cambios sin necesidad de recargar la pagina
            $this->likes++;
        }
    }
}
