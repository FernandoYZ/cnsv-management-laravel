<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AtributoInstitucional extends Model
{
    protected $table = 'atributos_institucionales';
    protected $fillable = [
        'entidad_type',
        'entidad_id',
        'titulo',
        'descripcion',
        'icono',
        'orden'
    ];

    protected $casts = [
        'orden' => 'integer'
    ];

    // Relación polimórfica
    public function entidad(): MorphTo
    {
        return $this->morphTo();
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
