<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Testimonio extends Model
{
    use HasFactory;
    
    protected $table = 'testimonios';
    protected $fillable = [
        'contenido',
        'autor',
        'cargo',
        'imagen_id',
        'seccion'
    ];

    protected $casts = [
        'seccion' => Seccion::class
    ];

    // Relación con la tabla 'archivos_multimedia'
    public function imagen(): BelongsTo
    {
        return $this->belongsTo(ArchivoMultimedia::class, 'imagen_id');
    }

    // Scope para filtrar por sección
    public function scopePorSeccion($query, Seccion $seccion)
    {
        return $query->where('seccion', $seccion);
    }
}
