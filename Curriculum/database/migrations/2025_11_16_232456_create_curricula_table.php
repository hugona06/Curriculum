<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::create('curricula', function (Blueprint $table) {
        $table->id();
        $table->string('nombre');
        $table->string('apellidos');
        $table->string('telefono')->nullable();
        $table->string('correo')->nullable();
        $table->date('fecha_nacimiento')->nullable();
        $table->float('nota_media')->nullable();
        $table->text('experiencia')->nullable();
        $table->text('formacion')->nullable();
        $table->text('habilidades')->nullable();
        $table->string('fotografia')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('curricula');
    }
};
