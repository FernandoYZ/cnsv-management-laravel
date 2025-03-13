<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HorarioAtencion extends Model
{
    protected $table = 'horario_atencion';
    protected $fillable = [
        'dias',
        'horas',
        'orden'
    ];

    protected $casts = [
        'orden' => 'integer'
    ];

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
