<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [

    'nombre',
    'apellidos',
    'email',
    'telefono',
    'rol',
    'id_barberia',
    'password'

    ];

    protected $hidden = [

        'password',
        'remember_token'

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

    public function barberia(){

        return $this->belongsTo(Barberia::class, 'id_barberia');

    }

    public function citasComoCliente()
    {
        return $this->hasMany(Cita::class, 'id_cliente');
    }

    public function citasComoBarbero()
    {
        return $this->hasMany(Cita::class, 'id_barbero');
    }
}
