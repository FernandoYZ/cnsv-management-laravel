<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AtributoSanto extends Model
{
    use HasFactory;

    protected $table = 'atributos_santo';
    protected $fillable = [
        'santo_id',
        'descripcion',
        'orden'
    ];

    protected $casts = [
        'orden' => 'integer'
    ];

    // Relación con la tabla 'santos_patronos'
    public function santo(): BelongsTo
    {
        return $this->belongsTo(SantoPatron::class, 'santo_id');
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
