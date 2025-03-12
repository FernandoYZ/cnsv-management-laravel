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
        Schema::create('seccion_contenido', function (Blueprint $table) {
            $table->id();
            $table->foreignId('seccion_id')->constrained()->cascadeOnDelete()->index();
            $table->string('clave', 100)->index();
            $table->text('valor')->nullable();
            $table->string('tipo')->default('texto'); // enum TipoSeccionContenido
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seccion_contenido');
    }
};
