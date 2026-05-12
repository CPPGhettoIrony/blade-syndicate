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
            'descripcion' => "Cortes clásicos con precisión milimétrica. La tradición de barrio combinada con el pulso firme de verdaderos artesanos de la tijera.",
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Gran Vía 12',
            'codigo_postal' => '28013',
            'telefono' => '910111111',
            'imagen' => 'A.avif',
            'horario_apertura' => '09:00',
            'horario_cierre' => '21:00'
        ]);

        Barberia::create([
            'nombre' => '4LIFESTYLE',
            "descripcion" => "Cultura urbana y vanguardia. Especialistas en degradados perfectos, diseños creativos y un estilo que marca tendencia en las calles.",
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Serrano 45',
            'codigo_postal' => '28001',
            'telefono' => '910222222',
            'imagen' => 'B.webp',
            'horario_apertura' => '10:00',
            'horario_cierre' => '22:00'
        ]);

        Barberia::create([
            'nombre' => 'Barbershop G.L.O',
            "descripcion" => "La experiencia VIP que mereces. Líneas impecables, rituales de barba con toalla caliente y un trato exclusivo de primera clase.",
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Fuencarral 30',
            'codigo_postal' => '28004',
            'telefono' => '910333333',
            'imagen' => 'C.avif',
            'horario_apertura' => '10:00',
            'horario_cierre' => '21:30'
        ]);

        Barberia::create([
            'nombre' => 'Lo Simio Flicc',
            "descripcion" => "Estilo salvaje y sin filtros. Domamos cualquier tipo de cabello con cortes atrevidos y la actitud más fresca de todo el sindicato.",
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Toledo 88',
            'codigo_postal' => '28005',
            'telefono' => '910444444',
            'imagen' => 'D.jpg',
            'horario_apertura' => '09:30',
            'horario_cierre' => '20:30'
        ]);

        Barberia::create([
            'nombre' => 'Juan "El Gorila" Barberz',
            "descripcion" => "Fuerza, carácter y navaja recta. Juan y su equipo ofrecen un trato cercano con acabados contundentes que no dejan a nadie indiferente.",
            'ciudad' => 'Madrid',
            'direccion' => 'Calle Alcalá 150',
            'codigo_postal' => '28009',
            'telefono' => '910555555',
            'imagen' => 'E.webp',
            'horario_apertura' => '11:00',
            'horario_cierre' => '22:00'
        ]);
    }
}