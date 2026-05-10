<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ADMIN GENERAL
        User::create([
            'nombre' => 'Carlos',
            'apellidos' => 'Administrador',
            'email' => 'admin@bladesyndicate.com',
            'telefono' => '600111111',
            'rol' => 'admin_general',
            'id_barberia' => null,
            'password' => bcrypt('12345678')
        ]);

        // ADMIN LOCAL BARBERÍA 1
        User::create([
            'nombre' => 'Javier',
            'apellidos' => 'Gómez',
            'email' => 'javier@bladesyndicate.com',
            'telefono' => '600222222',
            'rol' => 'admin_local',
            'id_barberia' => 1,
            'password' => bcrypt('12345678')
        ]);

        // BARBERO 1
        User::create([
            'nombre' => 'Juan',
            'apellidos' => 'Martín',
            'email' => 'juan@bladesyndicate.com',
            'telefono' => '600333333',
            'rol' => 'barbero',
            'id_barberia' => 1,
            'password' => bcrypt('12345678')
        ]);

        // BARBERO 2
        User::create([
            'nombre' => 'David',
            'apellidos' => 'Ruiz',
            'email' => 'david@bladesyndicate.com',
            'telefono' => '600444444',
            'rol' => 'barbero',
            'id_barberia' => 2,
            'password' => bcrypt('12345678')
        ]);

        // CLIENTE 1
        User::create([
            'nombre' => 'Raúl',
            'apellidos' => 'Fernández',
            'email' => 'raul@gmail.com',
            'telefono' => '600555555',
            'rol' => 'cliente',
            'id_barberia' => null,
            'password' => bcrypt('12345678')
        ]);

        // CLIENTE 2
        User::create([
            'nombre' => 'Mario',
            'apellidos' => 'López',
            'email' => 'mario@gmail.com',
            'telefono' => '600666666',
            'rol' => 'cliente',
            'id_barberia' => null,
            'password' => bcrypt('12345678')
        ]);
    }
    }
