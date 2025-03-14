<?php

namespace App\Models;

use App\Enum\TipoContactoInformacion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoInformacion extends Model
{
    use HasFactory;
    
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
