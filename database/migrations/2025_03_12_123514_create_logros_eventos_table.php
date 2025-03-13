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
        Schema::create('logros_eventos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('evento_id')
                ->constrained('historia_eventos')
                ->cascadeOnDelete()
                ->index()
                ->name('fk_logros_eventos_evento_id');
            $table->text('descripcion')->nullable();
            $table->integer('orden')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logros_eventos');
    }
};
