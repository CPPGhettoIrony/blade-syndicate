<?php

namespace Database\Seeders;
use App\Models\Cita;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cita::create([
            'id_cliente' => 5,
            'id_barbero' => 3,
            'id_barberia' => 1,
            'id_servicio' => 1,

            'fecha' => '2026-05-15',
            'hora_inicio' => '10:00',
            'hora_fin' => '10:30',

            'estado' => 'pendiente'
        ]);

        Cita::create([
            'id_cliente' => 6,
            'id_barbero' => 4,
            'id_barberia' => 2,
            'id_servicio' => 2,

            'fecha' => '2026-05-16',
            'hora_inicio' => '12:00',
            'hora_fin' => '12:45',

            'estado' => 'confirmada'
        ]);

        Cita::create([
            'id_cliente' => 5,
            'id_barbero' => 3,
            'id_barberia' => 1,
            'id_servicio' => 4,

            'fecha' => '2026-05-18',
            'hora_inicio' => '18:00',
            'hora_fin' => '19:00',

            'estado' => 'completada'
        ]);
    }
}
