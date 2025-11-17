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
        $table->string('dni')->unique();
        $table->string('direccion');
        $table->float('nota_media')->nullable();
        $table->text('skills')->nullable();
        $table->string('foto')->nullable();
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('curricula');
    }
};
