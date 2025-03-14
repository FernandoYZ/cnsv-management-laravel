<?php

namespace App\Models;

use App\Enum\TipoPagina;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pagina extends Model
{
    protected $table = 'paginas';
    protected $fillable = [
        'slug',
        'titulo',
        'meta_description',
        'meta_keywords',
        'imagen_destacada_id',
        'orden',
        'tipo',
        'estado'
    ];
    protected $casts = [
        'tipo' => TipoPagina::class,
    ];

    // Relación con la tabla 'archivos_multimedia'
    public function archivoMultimedia():BelongsTo {
        return $this->belongsTo(ArchivoMultimedia::class, 'imagen_destacada_id');
    }

    // Relación con la tabla 'secciones'
    public function secciones():HasMany {
        return $this->hasMany(Seccion::class, 'pagina_id');
    }

}
