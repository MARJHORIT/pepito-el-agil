<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ingreso;  // ← Importante: usar App\Models

class IngresoSeeder extends Seeder
{
    public function run()
    {
        Ingreso::factory()->count(50)->create();
    }
}