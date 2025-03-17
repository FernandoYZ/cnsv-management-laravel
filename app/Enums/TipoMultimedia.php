<?php

namespace App\Enum;

enum TipoMultimedia: string {
    case imagen = 'imagen';
    case video = 'video';
    case documento = 'documento';
    case audio = 'audio';
}
