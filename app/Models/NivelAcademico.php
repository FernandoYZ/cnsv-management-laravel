<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modalidad;

class NivelAcademico extends Model
{
    protected $table = 'niveles_academicos';
    protected $fillable = [
        'titulo',
        'modalidad',
        'descripcion',
        'horario'
    ];

    protected $casts = [
        'modalidad' => Modalidad::class
    ];

    // Relación con la tabla 'grados_nivel'
    public function grados(): HasMany
    {
        return $this->hasMany(GradoNivel::class, 'nivel_id');
    }

    // Relación con la tabla 'caracteristicas_nivel'
    public function caracteristicas(): HasMany
    {
        return $this->hasMany(CaracteristicaNivel::class, 'nivel_id');
    }

    // Scope para filtrar por modalidad
    public function scopePorModalidad($query, Modalidad $modalidad)
    {
        return $query->where('modalidad', $modalidad);
    }
}
