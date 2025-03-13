<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LogroEvento extends Model
{
    protected $table = 'logros_eventos';
    protected $fillable = [
        'evento_id',
        'descripcion',
        'orden'
    ];

    protected $casts = [
        'orden' => 'integer'
    ];

    // Relación con la tabla 'historia_eventos'
    public function evento(): BelongsTo
    {
        return $this->belongsTo(HistoriaEvento::class, 'evento_id');
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
