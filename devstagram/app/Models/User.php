<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username', // Se agrega cuando lo migras
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    // Almacena los seguidores de un usuario

    public function followers()
    {
        // Se te sales de la convencion, especificas el nombre de la tabla, llave foranea del pivote y la relacion con el pivote
        return $this->belongsToMany(User::class,'followers','user_id','follower_id');
    }

    // Comprobar si un usuario ya lo esta siguiendo
    public function siguiendo(User $user)
    {
        //se acceder a followers que esta aqui arriba
        // Contains itera en toda la tabla de followers
        // El $user->id es del que esta loggeado
        return $this->followers->contains($user->id);
    }

    
    // Almacenar a los que seguimos
    public function followings()
    {
        // Solo se cambia el orden de las columnas
        return $this->belongsToMany(User::class,'followers','follower_id','user_id');
    }
    
}
