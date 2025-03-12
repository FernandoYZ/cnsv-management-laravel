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
        Schema::create('grados_nivel', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nivel_id')->constrained('niveles_academicos')->cascadeOnDelete();
            $table->string('grado', 50); // enum Grado
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grados_nivel');
    }
};
