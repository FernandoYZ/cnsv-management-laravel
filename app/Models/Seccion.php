<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Seccion extends Model
{
    protected $table = 'secciones';
    protected $fillable = [
        'pagina_id',
        'componente_id',
        'identificador',
        'titulo',
        'estado',
        'orden'
    ];

    protected $casts = [
        'estado' => 'boolean',
        'orden' => 'integer'
    ];

    public $timestamps = true;

    // Relación con la tabla 'paginas'
    public function pagina(): BelongsTo
    {
        return $this->belongsTo(Pagina::class, 'pagina_id');
    }

    // Relación con la tabla 'componentes'
    public function componente(): BelongsTo
    {
        return $this->belongsTo(Componente::class, 'componente_id');
    }

    // Relación con la tabla 'seccion_contenido'
    public function contenidos(): HasMany
    {
        return $this->hasMany(SeccionContenido::class, 'seccion_id');
    }

    // Método para obtener el contenido por clave
    public function getContenido(string $clave)
    {
        return $this->contenidos()->where('clave', $clave)->first();
    }

    // Scope para obtener secciones activas
    public function scopeActivas($query)
    {
        return $query->where('estado', true);
    }

    // Scope para ordenar por campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
