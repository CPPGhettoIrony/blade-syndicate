<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    protected $fillable = [

        'id_cliente',
        'id_barbero',
        'id_barberia',
        'id_servicio',

        'fecha',
        'hora_inicio',
        'hora_fin',
        'estado'

    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'id_cliente');
    }

    public function barbero()
    {
        return $this->belongsTo(User::class, 'id_barbero');
    }

    public function barberia()
    {
        return $this->belongsTo(Barberia::class, 'id_barberia');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'id_servicio');
    }

}
