<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('egresos', function (Blueprint $table) {
        $table->id();
        $table->decimal('monto', 10, 2);
        $table->string('concepto');
        $table->date('fecha');
        $table->foreignId('contribuyente_id')->constrained();
        $table->timestamps();
    });
}
};
