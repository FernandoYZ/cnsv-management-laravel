<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SantoPatron extends Model
{
    protected $table = 'santos_patronos';
    protected $fillable = [
        'nombre',
        'titulo',
        'descripcion',
        'imagen_id'
    ];

    // Relación con la tabla 'archivos_multimedia'
    public function imagen(): BelongsTo
    {
        return $this->belongsTo(ArchivoMultimedia::class, 'imagen_id');
    }

    // Relación con la tabla 'atributos_santo'
    public function atributos(): HasMany
    {
        return $this->hasMany(AtributoSanto::class, 'santo_id');
    }

    // Relación polimórfica con atributos_institucionales
    public function atributosInstitucionales(): MorphMany
    {
        return $this->morphMany(AtributoInstitucional::class, 'entidad');
    }
}
