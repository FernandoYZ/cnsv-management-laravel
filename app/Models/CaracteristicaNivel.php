<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CaracteristicaNivel extends Model
{
    protected $table = 'caracteristicas_nivel';
    public $timestamps = false;

    protected $fillable = [
        'nivel_id',
        'descripcion',
        'orden'
    ];

    protected $casts = [
        'orden' => 'integer'
    ];

    // Relación con la tabla 'niveles_academicos'
    public function nivel(): BelongsTo
    {
        return $this->belongsTo(NivelAcademico::class, 'nivel_id');
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
