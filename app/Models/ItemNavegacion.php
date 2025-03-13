<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use TipoNavegacion;

class ItemNavegacion extends Model
{
    protected $table = 'navegacion_items';
    protected $fillable = [
        'parent_id',
        'titulo',
        'href',
        'icono',
        'tipo',
        'orden'
    ];

    protected $casts = [
        'tipo' => TipoNavegacion::class,
        'orden' => 'integer'
    ];

    // Relación consigo misma para elementos padre
    public function parent(): BelongsTo
    {
        return $this->belongsTo(ItemNavegacion::class, 'parent_id');
    }

    // Relación consigo misma para elementos hijo
    public function hijos(): HasMany
    {
        return $this->hasMany(ItemNavegacion::class, 'parent_id');
    }

    // Scope para elementos raíz (sin parent)
    public function scopeRaiz($query)
    {
        return $query->whereNull('parent_id');
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }

    // Scope para filtrar por tipo
    public function scopePorTipo($query, TipoNavegacion $tipo)
    {
        return $query->where('tipo', $tipo)->orWhere('tipo', TipoNavegacion::ambos);
    }
}
