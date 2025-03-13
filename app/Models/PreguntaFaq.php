<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PreguntaFaq extends Model
{
    protected $table = 'faq_preguntas';
    protected $fillable = [
        'categoria_id',
        'pregunta',
        'respuesta',
        'orden'
    ];

    protected $casts = [
        'orden' => 'integer'
    ];

    // Relación con la tabla 'faq_categorias'
    public function categoria(): BelongsTo
    {
        return $this->belongsTo(CategoriaFaq::class, 'categoria_id');
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
