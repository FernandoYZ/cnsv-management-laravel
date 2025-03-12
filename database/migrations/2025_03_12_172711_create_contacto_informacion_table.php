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
        Schema::create('contacto_informacion', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 100); // enum TipoContactoInformacion
            $table->text('contenido');
            $table->text('icono')->nullable();
            $table->boolean('es_enlace')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacto_informacion');
    }
};
