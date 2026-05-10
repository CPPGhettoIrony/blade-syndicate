<?php

namespace Database\Seeders;
use App\Models\Servicio;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Servicio::create([
            'nombre' => 'Corte clásico',
            'descripcion' => 'Corte tradicional a tijera y máquina.',
            'precio' => 15.00,
            'duracion_min' => 30
        ]);

        Servicio::create([
            'nombre' => 'Degradado',
            'descripcion' => 'Degradado moderno con acabado personalizado.',
            'precio' => 18.00,
            'duracion_min' => 45
        ]);

        Servicio::create([
            'nombre' => 'Barba',
            'descripcion' => 'Arreglo y perfilado de barba.',
            'precio' => 10.00,
            'duracion_min' => 20
        ]);

        Servicio::create([
            'nombre' => 'Corte + Barba',
            'descripcion' => 'Servicio completo de corte de pelo y arreglo de barba.',
            'precio' => 25.00,
            'duracion_min' => 60
        ]);

        Servicio::create([
            'nombre' => 'Tinte',
            'descripcion' => 'Aplicación de color o matiz personalizado.',
            'precio' => 35.00,
            'duracion_min' => 90
        ]);
    }
}
