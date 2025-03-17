<?php

namespace App\Enum;

enum TipoSeccionContenido: string {
    case texto = 'texto';
    case imagen = 'imagen';
    case json = 'json';
    case html = 'html';
    case icono = 'icono';
    case enlace = 'enlace';
}
