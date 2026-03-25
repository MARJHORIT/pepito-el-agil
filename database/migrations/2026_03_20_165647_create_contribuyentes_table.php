<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('contribuyentes', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('email')->nullable();
        $table->string('telefono')->nullable();
        $table->text('direccion')->nullable();
        $table->string('tipo')->default('natural');
        $table->timestamps();
    });
}
};
