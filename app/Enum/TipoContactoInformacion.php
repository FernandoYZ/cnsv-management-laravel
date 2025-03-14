<?php

namespace App\Enum;

enum TipoContactoInformacion: string {
    case direccion = 'direccion';
    case telefono = 'telefono';
    case correo = 'correo';
    case whatsapp = 'whatsapp';
}
