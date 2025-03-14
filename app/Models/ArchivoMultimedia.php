<?php

namespace App\Models;

use App\Enum\TipoMultimedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ArchivoMultimedia extends Model
{
    protected $table = 'archivos_multimedia';
    protected $fillable = [
        'nombre',
        'ruta',
        'tipo',
        'mime_type',
        'alt_text',
        'tamano',
        'seccion'
    ];
    protected $casts = [
        'tipo' => TipoMultimedia::class,
        'tamano' => 'integer'
    ];

    // Relación con la tabla 'paginas'
    public function paginas():HasMany {
        return $this->hasMany(Pagina::class, 'imagen_destacada_id');
    }

    // Relación con la tabla empleados
    public function empleados(): HasMany
    {
        return $this->hasMany(Empleado::class, 'imagen_id');
    }

    // Relación con la tabla historia_eventos
    public function historiaEventos(): HasMany
    {
        return $this->hasMany(HistoriaEvento::class, 'imagen_id');
    }

    // Relación con la tabla testimonios
    public function testimonios(): HasMany
    {
        return $this->hasMany(Testimonio::class, 'imagen_id');
    }

    // Relación con la tabla santos_patronos
    public function santosPatronos(): HasMany
    {
        return $this->hasMany(SantoPatron::class, 'imagen_id');
    }

    // Relación con la tabla donacion_metodos
    public function donacionMetodos(): HasMany
    {
        return $this->hasMany(DonacionMetodo::class, 'imagen_id');
    }
}


