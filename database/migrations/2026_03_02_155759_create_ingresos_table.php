<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->string('boleta_numero')->unique();
            $table->string('codigo_presupuestal');
            $table->string('descripcion_codigo');
            $table->string('contribuyente');
            $table->string('motivo');
            $table->string('serie_documento')->nullable();
            $table->integer('cantidad')->default(1);
            $table->decimal('monto', 10, 2);
            $table->decimal('total', 10, 2);
            $table->string('categoria');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
};