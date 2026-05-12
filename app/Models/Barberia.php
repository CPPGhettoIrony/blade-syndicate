<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barberia extends Model
{
    protected $fillable = [ //Qué campos se pueden rellenar automáticamente

        'nombre',
        'descripcion',
        'ciudad',
        'direccion',
        'codigo_postal',
        'telefono',
        'horario_apertura',
        'horario_cierre',
        'imagen'

    ];

    public function usuarios(){

        return $this->hasMany(User::class, 'id_barberia');

    }

    public function citas(){

        return $this->hasMany(Cita::class, 'id_barberia');
        
    }

}
