<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder



{
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),

            'rol' => 'admin',
            'area' => 'sistemas',
            'activo' => true,
        ]);

        // Jefe de rentas
        User::create([
            'name' => 'Marjhori Garcia',
            'email' => 'marjhori@gmail.com',
            'password' => Hash::make('12345678'),
            'rol' => 'admin',
            'area' => 'rentas',
            'activo' => true,
        ]);

        // Operadores
        User::create([
            'name' => 'Carlos Lopez',
            'email' => 'carlos@municipalidad.gob.pe',
            'password' => Hash::make('operador123'),
            'rol' => 'operador',
            'area' => 'tributaria',
            'activo' => true,
        ]);

        User::create([
            'name' => 'Ana Martinez',
            'email' => 'ana@municipalidad.gob.pe',
            'password' => Hash::make('operador123'),
            'rol' => 'operador',
            'area' => 'registro',
            'activo' => true,
        ]);

        // Consultor (solo reportes)
        User::create([
            'name' => 'Roberto Sanchez',
            'email' => 'consultor@municipalidad.gob.pe',
            'password' => Hash::make('consultor123'),
            'rol' => 'consultor',
            'area' => 'planeamiento',
            'activo' => true,
        ]);
    }
}