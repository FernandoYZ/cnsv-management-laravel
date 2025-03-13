<?php

namespace App\Models;

use Grado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GradoNivel extends Model
{
    protected $table = 'grados_nivel';
    public $timestamps = false;

    protected $fillable = [
        'nivel_id',
        'grado',
        'orden'
    ];

    protected $casts = [
        'grado' => Grado::class,
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
