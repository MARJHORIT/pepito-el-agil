<?php

namespace Database\Factories;

use App\Models\Ingreso;
use Illuminate\Database\Eloquent\Factories\Factory;

class IngresoFactory extends Factory
{
    protected $model = Ingreso::class;
    
    public function definition()
    {
        return [
            'numero_boleta' => 'B' . $this->faker->unique()->numberBetween(1000, 9999) . '-' . date('Y'),
            'codigo' => $this->faker->randomElement(['VEN', 'SRV', 'PRO', 'CON', 'MNT']),
            'descripcion' => $this->faker->randomElement(['Ventas', 'Servicios', 'Productos', 'Consultoría', 'Mantenimiento']),
            'monto' => $this->faker->randomFloat(2, 50, 5000),
            'fecha' => $this->faker->dateTimeBetween('2026-01-01', '2026-12-31'),
            'cliente_nombre' => $this->faker->name(),
            'cliente_documento' => $this->faker->numerify('###########'),
            'motivo' => $this->faker->sentence(),
            'metodo_pago' => $this->faker->randomElement(['efectivo', 'tarjeta', 'transferencia']),
            'estado' => 'activo',
            'observaciones' => $this->faker->text(100),
        ];
    }
}