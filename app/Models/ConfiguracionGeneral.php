<?php

namespace App\Models;

use App\Enum\TipoConfiguracion;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class ConfiguracionGeneral extends Model
{
    protected $table = 'configuracion_general';
    protected $fillable = [
        'clave',
        'valor',
        'tipo',
        'descripcion'
    ];
    protected $casts = [
        'tipo' => TipoConfiguracion::class,
    ];


    // Definición de casts para propiedades del modelo
    protected function valor(): Attribute
    {
        return Attribute::make(
            get: function ($value, $attributes) {
                switch ($attributes['tipo']) {
                    case TipoConfiguracion::json->value:
                        return json_decode($value, true);
                    case TipoConfiguracion::numero->value:
                        return (float) $value;
                    case TipoConfiguracion::boolean->value:
                        return (bool) $value;
                    default:
                        return $value;
                }
            }
        );
    }


    // Método para obtener el valor formateado según su tipo
    // Solo maneja el caso especial de imágenes, el resto ya es manejado por los casts
    public function getValorFormateado()
    {
        if ($this->tipo === TipoConfiguracion::imagen) {
            return ArchivoMultimedia::find($this->valor);
        }
        return $this->valor; // Texto, número, booleano, JSON ya son convertidos por los casts
    }


    // Método estático para obtener una configuración por clave
    public static function obtener(string $clave, $valorPorDefecto = null)
    {
        $config = static::where('clave', $clave)->first();

        if (!$config) {
            return $valorPorDefecto;
        }

        return $config->getValorFormateado();
    }
}
