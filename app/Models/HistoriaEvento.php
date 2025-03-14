<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HistoriaEvento extends Model
{
    use HasFactory;
    
    protected $table = 'historia_eventos';
    protected $fillable = [
        'anio',
        'fecha',
        'titulo',
        'descripcion',
        'imagen_id',
        'icono',
        'orden'
    ];

    protected $casts = [
        'anio' => 'integer',
        'fecha' => 'date',
        'orden' => 'integer'
    ];

    // Relación con la tabla 'archivos_multimedia'
    public function imagen(): BelongsTo
    {
        return $this->belongsTo(ArchivoMultimedia::class, 'imagen_id');
    }

    // Relación con la tabla 'logros_eventos'
    public function logros(): HasMany
    {
        return $this->hasMany(LogroEvento::class, 'evento_id');
    }

    // Scope para ordenar eventos cronológicamente
    public function scopeCronologico($query)
    {
        return $query->orderBy('anio')->orderBy('fecha');
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
