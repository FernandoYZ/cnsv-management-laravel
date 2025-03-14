<?php

namespace App\Enum;

enum TipoConfiguracion: string {
    case texto = 'texto';
    case json = 'json';
    case imagen = 'imagen';
    case numero = 'numero';
    case boolean = 'boolean';
}
