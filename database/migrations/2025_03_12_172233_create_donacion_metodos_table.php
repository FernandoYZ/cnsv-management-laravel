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
        Schema::create('donacion_metodos', function (Blueprint $table) {
            $table->id();
            $table->string('tipo', 100); // enum TipoDonacion
            $table->string('titulo', 255);
            $table->json('datos_json')->nullable();
            $table->foreignId('imagen_id')->constrained('archivos_multimedia')->nullOnDelete()->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donacion_metodos');
    }
};
