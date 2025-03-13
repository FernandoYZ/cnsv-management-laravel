<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoriaFaq extends Model
{
    protected $table = 'faq_categorias';
    protected $fillable = [
        'titulo',
        'descripcion',
        'icono',
        'orden'
    ];

    protected $casts = [
        'orden' => 'integer'
    ];

    // Relación con la tabla 'faq_preguntas'
    public function preguntas(): HasMany
    {
        return $this->hasMany(PreguntaFaq::class, 'categoria_id');
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
