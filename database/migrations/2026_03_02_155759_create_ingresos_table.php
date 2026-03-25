<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
    public function up()
{
    Schema::create('ingresos', function (Blueprint $table) {
        $table->id();
        $table->string('numero_boleta')->unique();
        $table->string('codigo', 20);
        $table->string('descripcion', 100);
        $table->decimal('monto', 12, 2);
        $table->date('fecha');
        $table->string('cliente_nombre', 100)->nullable();
        $table->string('cliente_documento', 20)->nullable();
        $table->text('motivo')->nullable();
        $table->string('metodo_pago', 20)->default('efectivo');
        $table->string('estado', 20)->default('activo');
        $table->text('observaciones')->nullable();
        $table->timestamps();
    });
}