<?php

namespace App\Models;

use App\Enum\Grado;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Testing\Fluent\Concerns\Has;

class GradoNivel extends Model
{
    use HasFactory;
    
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
