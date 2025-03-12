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
        Schema::create('faq_preguntas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('categoria_id')->constrained('faq_categorias')->cascadeOnDelete()->index();
            $table->text('pregunta');
            $table->text('respuesta');
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_preguntas');
    }
};
