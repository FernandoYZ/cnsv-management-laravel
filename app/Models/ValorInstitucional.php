<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use TipoValores;

class ValorInstitucional extends Model
{
    protected $table = 'valores_institucionales';
    protected $fillable = [
        'titulo',
        'descripcion',
        'icono',
        'tipo',
        'orden'
    ];

    protected $casts = [
        'tipo' => TipoValores::class,
        'orden' => 'integer'
    ];

    // Relación polimórfica con atributos_institucionales
    public function atributos(): MorphMany
    {
        return $this->morphMany(AtributoInstitucional::class, 'entidad');
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }

    // Scope para filtrar por tipo
    public function scopePorTipo($query, TipoValores $tipo)
    {
        return $query->where('tipo', $tipo);
    }
}
