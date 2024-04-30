<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vacante extends Model
{
    use HasFactory;
    // En la bd viene como string, esto hace que venga como fecha
    protected $casts = ['ultimo_dia'=>'date']; 

    protected $fillable = [
        'titulo',
        'salario_id',
        'categoria_id',
        'empresa',
        'ultimo_dia',
        'descripcion',
        'imagen',
        'user_id',
    ];
}
