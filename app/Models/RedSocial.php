<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use RedesSociales;
use TipoValores;

class RedSocial extends Model
{
    protected $table = 'redes_sociales';
    protected $fillable = [
        'nombre',
        'url',
        'icono',
        'orden'
    ];

    protected $casts = [
        'nombre' => RedesSociales::class,
        'orden' => 'integer'
    ];

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
