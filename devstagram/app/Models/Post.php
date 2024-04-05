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
        return $this->belongsTo(User::class)->select([
            'name',
            'username'
        ]);
    }
}