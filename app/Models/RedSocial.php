<?php

namespace App\Models;

use App\Enum\RedesSociales;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class RedSocial extends Model
{
    use HasFactory;
    
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
