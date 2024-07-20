<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productos()
    {
        // withPivot agrega la columna de la cantidad
        return $this->belongsToMany(Producto::class,'pedido_productos')->withPivot('cantidad');
    }
}
