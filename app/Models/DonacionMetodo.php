<?php

namespace App\Models;

use App\Enum\TipoDonacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DonacionMetodo extends Model
{
    use HasFactory;
    
    protected $table = 'donacion_metodos';
    protected $fillable = [
        'tipo',
        'titulo',
        'datos_json',
        'imagen_id',
        'orden'
    ];

    protected $casts = [
        'tipo' => TipoDonacion::class,
        'datos_json' => 'array',
        'orden' => 'integer'
    ];

    // Relación con la tabla 'archivos_multimedia'
    public function imagen(): BelongsTo
    {
        return $this->belongsTo(ArchivoMultimedia::class, 'imagen_id');
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }

    // Scope para filtrar por tipo
    public function scopePorTipo($query, TipoDonacion $tipo)
    {
        return $query->where('tipo', $tipo);
    }
}
