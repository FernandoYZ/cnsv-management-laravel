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
            $table->string('meta_description', 500)->default('El Colegio Nuestra Señora del Valle ofrece educación integral, formación en valores y seminario menor en modalidad de residencia. Descubre nuestra propuesta educativa única.')->nullable();
            $table->string('meta_keywords', 255)->default('educación primaria, educación secundaria, seminario menor, educación religiosa, valores, formación integral, colegio con residencia, colegio internado')->nullable();
            $table->string('meta_imagen')->default('https://cnsv.edu.pe/_astro/frontis.ClnsjFXL_Z2hBNcg.webp')->nullable();
            $table->integer('orden')->default(0);
            // $table->string('tipo', 50)->nullable(); // No se usará por el momento
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
