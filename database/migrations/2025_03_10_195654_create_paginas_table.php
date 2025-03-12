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
            $table->string('meta_description', 500)->nullable();
            $table->string('meta_keywords', 255)->nullable();
            $table->foreignId('imagen_destacada_id')->nullable()->constrained('archivos_multimedia')->nullOnDelete();
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
