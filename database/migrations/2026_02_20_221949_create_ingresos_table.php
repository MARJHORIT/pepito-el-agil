<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration

{
    Schema::create('ingresos', function (Blueprint $table) {
        $table->id();
        $table->decimal('monto', 10, 2);
        $table->date('fecha');

        $table->foreignId('persona_id')->constrained('personas')->onDelete('cascade');
        $table->foreignId('clasificacion_id')->constrained('clasificacions')->onDelete('cascade');
        $table->foreignId('anio_fiscal_id')->constrained('anio_fiscals')->onDelete('cascade');

        $table->timestamps();
    });
}
