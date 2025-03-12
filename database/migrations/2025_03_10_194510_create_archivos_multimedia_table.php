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
        Schema::create('archivos_multimedia', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('ruta', 255);
            $table->string('tipo')->index(); // enum TipoMultimedia
            $table->string('mime_type', 100)->nullable();
            $table->string('alt_text', 255)->nullable();
            $table->bigInteger('tamano')->nullable();
            $table->string('seccion', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos_multimedia');
    }
};
