<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TipoContactoInformacion;

class ContactoInformacion extends Model
{
    protected $table = 'contacto_informacion';
    protected $fillable = [
        'tipo',
        'contenido',
        'icono',
        'es_enlace'
    ];

    protected $casts = [
        'tipo' => TipoContactoInformacion::class,
        'es_enlace' => 'boolean'
    ];

    // Scope para filtrar por tipo
    public function scopePorTipo($query, TipoContactoInformacion $tipo)
    {
        return $query->where('tipo', $tipo);
    }
}
