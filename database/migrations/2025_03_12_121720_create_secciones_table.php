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
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pagina_id')
                ->constrained('paginas')
                ->cascadeOnDelete()
                ->index()
                ->name('fk_secciones_pagina_id');
            $table->foreignId('componente_id')
                ->constrained('componentes')
                ->cascadeOnDelete()
                ->index()
                ->name('fk_secciones_componente_id');
            $table->string('identificador', 100);
            $table->string('titulo', 255)->nullable();
            $table->boolean('estado')->default(true);
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secciones');
    }
};
