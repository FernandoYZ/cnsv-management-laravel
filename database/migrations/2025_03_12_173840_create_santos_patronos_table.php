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
        Schema::create('santos_patronos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('titulo', 255)->nullable();
            $table->text('descripcion')->nullable();
            $table->foreignId('imagen_id')->constrained('archivos_multimedia')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santos_patronos');
    }
};
