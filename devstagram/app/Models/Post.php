<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Manera de proteger tu bd
    // fillable es la informacion que se va a llenar en tu bd
    protected $fillable = [
        'titulo',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function user()
    {
        // select nos ayuda a traer los datos que queramos solamente
        // Despues del belongsTo o cualquier otra relacion, se puede añadir una llave foranea
        return $this->belongsTo(User::class)->select([
            'name',
            'username'
        ]);
    }

    public function comentarios()
    {
        return $this->hasMany(comentario::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Validar que los likes no se repitan del mismo usuario
    public function checkLike(User $user)
    {
        // El likes es de la funcion de arriba de likes() solo que no se llama con parentesis
        // contains checa las columnas de la tabla de likes y regresa un bool

        // el user_id es el nombre de la columna de la tabla de la bd
        return $this->likes->contains('user_id',$user->id);
    }
}
