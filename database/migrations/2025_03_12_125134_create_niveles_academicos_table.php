<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('niveles_academicos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo', 255);
            $table->string('modalidad'); // enum Modalidad
            $table->text('descripcion')->nullable();
            $table->string('horario', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('niveles_academicos');
    }
};
