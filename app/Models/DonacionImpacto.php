<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonacionImpacto extends Model
{
    protected $table = 'donacion_impacto';
    protected $fillable = [
        'titulo',
        'descripcion',
        'icono',
        'cantidad',
        'meta',
        'orden'
    ];

    protected $casts = [
        'orden' => 'integer'
    ];

    // Scope para ordenar por el campo 'orden'
    public function scopeOrdenado($query)
    {
        return $query->orderBy('orden');
    }

    // Método para calcular porcentaje completado
    public function getPorcentajeCompletado()
    {
        if (empty($this->cantidad) || empty($this->meta)) {
            return 0;
        }

        return min(100, round(($this->cantidad / $this->meta) * 100));
    }
}
