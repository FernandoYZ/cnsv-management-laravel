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
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->string('slug', 255)->unique();
            $table->string('titulo', 255);
            $table->string('meta_description', 500)
                ->default('El Colegio Nuestra Señora del Valle ofrece educación integral, formación en valores y seminario menor en modalidad de residencia. Descubre nuestra propuesta educativa única.')
                ->nullable();
            $table->string('meta_keywords', 255)
                ->default('educación primaria, educación secundaria, seminario menor, educación religiosa, valores, formación integral, colegio con residencia, colegio internado')
                ->nullable();
            $table->foreignId('imagen_destacada_id')
                ->nullable()
                ->constrained('archivos_multimedia')
                ->onDelete('set null')
                ->index()
                ->name('fk_paginas_imagen_destacada_id');
            $table->integer('orden')->default(0);
            $table->string('tipo', 50)->nullable()->index(); // enum TipoPagina
            $table->boolean('estado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};
