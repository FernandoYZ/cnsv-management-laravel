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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->string('cargo', 255)->nullable();
            $table->foreignId('imagen_id')->constrained('archivos_multimedia')->nullOnDelete()->nullable();
            $table->text('descripcion')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('celular', 20)->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
