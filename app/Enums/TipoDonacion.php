<?php

namespace App\Enum;

enum TipoDonacion: string {
    case transferencia = 'transferencia';
    case yape = 'yape';
    case plin = 'plin';
    case efectivo = 'efectivo';
    case otro = 'otro';
}
