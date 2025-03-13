<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Empleado extends Model
{
    protected $table = 'empleados';
    protected $fillable = [
        'nombre',
        'apellido',
        'cargo',
        'imagen_id',
        'descripcion',
        'email',
        'celular',
        'orden',
        'estado'
    ];

    protected $casts = [
        'orden' => 'integer',
        'estado' => 'boolean'
    ];

    // Relación con la tabla 'archivos_multimedia'
    public function imagen(): BelongsTo
    {
        return $this->belongsTo(ArchivoMultimedia::class, 'imagen_id');
    }

    // Método para obtener nombre completo
    public function getNombreCompleto()
    {
        return $this->nombre . ' ' . $this->apellido;
    }

    // Scope para empleados activos
    public function scopeActivos($query)
    {
        return $query->where('estado', true);
    }

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }
}
