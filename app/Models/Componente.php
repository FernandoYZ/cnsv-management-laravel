<?php

namespace App\Models;

use App\Enum\TipoComponente;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Componente extends Model
{
    use HasFactory;

    protected $table = 'componentes';
    protected $fillable = [
        'nombre',
        'tipo',
        'descripcion',
        'configuracion_json'
    ];
    protected $casts = [
        'tipo' => TipoComponente::class,
        'configuracion_json' => 'array' // ¿Se debe usar array o existe el object
    ];

    // Relación con la tabla 'secciones'
    public function secciones():HasMany {
        return $this->hasMany(Seccion::class, 'componente_id');
    }
}
