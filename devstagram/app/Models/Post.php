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
}
