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
        Schema::create('atributos_institucionales', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('entidad_id')->constrained()->nullOnDelete()->nullable();  // No sé qué tabla va relacionado
            // $table->string('entidad_tipo', 50); // enum TipoEntidad
            $table->morphs('entidad');
            $table->string('titulo', 255)->nullable();
            $table->text('descripcion');
            $table->text('icono')->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atributos_institucionales');
    }
};
