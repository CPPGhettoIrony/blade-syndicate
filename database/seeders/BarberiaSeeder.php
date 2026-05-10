<?php

namespace Database\Seeders;
use App\Models\Barberia;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarberiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Barberia::create([
            'nombre' => 'Los Enanitos Barber Shop',
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Gran Vía 12',
            'codigo_postal' => '28013',
            'telefono' => '910111111',
            'horario_apertura' => '09:00',
            'horario_cierre' => '21:00'
        ]);

        Barberia::create([
            'nombre' => '4LIFESTYLE',
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Serrano 45',
            'codigo_postal' => '28001',
            'telefono' => '910222222',
            'horario_apertura' => '10:00',
            'horario_cierre' => '22:00'
        ]);

        Barberia::create([
            'nombre' => 'Barbershop G.L.O',
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Fuencarral 30',
            'codigo_postal' => '28004',
            'telefono' => '910333333',
            'horario_apertura' => '10:00',
            'horario_cierre' => '21:30'
        ]);

        Barberia::create([
            'nombre' => 'Lo Simio Flicc',
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Toledo 88',
            'codigo_postal' => '28005',
            'telefono' => '910444444',
            'horario_apertura' => '09:30',
            'horario_cierre' => '20:30'
        ]);

        Barberia::create([
            'nombre' => 'Juan "El Gorila" Gutiérrez Barberz',
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Alcalá 150',
            'codigo_postal' => '28009',
            'telefono' => '910555555',
            'horario_apertura' => '11:00',
            'horario_cierre' => '22:00'
        ]);
    }
}