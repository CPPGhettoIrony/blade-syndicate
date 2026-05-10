<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'duracion_min'
    ];

    public function citas()
    {
        return $this->hasMany(Cita::class, 'id_servicio');
    }
}
