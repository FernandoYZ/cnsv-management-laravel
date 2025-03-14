<?php

namespace App\Enum;

enum TipoComponente: string {
    case hero = 'hero';
    case redirect = 'redirect';
    case section = 'section';
    case slider = 'slider';
    case timeline = 'timeline';
    case gallery = 'gallery';
}
