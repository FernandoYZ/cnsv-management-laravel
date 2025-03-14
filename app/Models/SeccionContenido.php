<?php

namespace App\Models;

use App\Enum\TipoSeccionContenido;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SeccionContenido extends Model
{
    use HasFactory;
    
    protected $table = 'seccion_contenido';

    protected $fillable = [
        'seccion_id',
        'clave',
        'valor',
        'tipo'
    ];

    protected $casts = [
        'tipo' => TipoSeccionContenido::class,
        // 'valor' => 'array',
    ];

    protected function valor(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                return $attributes['tipo'] === TipoSeccionContenido::json->value
                    ? json_decode($value, true)
                    : $value;
            }
        );
    }

    // Relación con la tabla 'secciones'
    public function seccion(): BelongsTo
    {
        return $this->belongsTo(Seccion::class, 'seccion_id');
    }


    // Método para obtener el valor formateado para casos especiales
    public function getValorFormateado()
    {
        if ($this->tipo === TipoSeccionContenido::imagen) {
            return ArchivoMultimedia::find($this->valor);
        }

        return $this->valor;
    }
}
