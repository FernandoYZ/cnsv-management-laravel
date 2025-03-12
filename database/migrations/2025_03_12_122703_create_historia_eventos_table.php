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
        Schema::create('historia_eventos', function (Blueprint $table) {
            $table->id();
            $table->integer('anio')->index();
            $table->date('fecha')->nullable();
            $table->string('titulo', 255);
            $table->text('descripcion')->nullable();
            $table->foreignId('imagen_id')->constrained('archivos_multimedia')->nullOnDelete();
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
        Schema::dropIfExists('historia_eventos');
    }
};
