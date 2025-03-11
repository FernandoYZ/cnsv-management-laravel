<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagina extends Model
{
    protected $table = 'paginas';
    protected $fillable = [
        'slug',
        'titulo',
        'meta_description',
        'meta_keywords',
        'meta_imagen',
        'orden',
        // 'tipo',
        'estado'
    ];
}
