<?php
// Tabla paginas
enum TipoPagina: string {
    case inicio = 'inicio';
    case sobreNosotros = 'sobre-nosotros';
    case visitanos = 'visitanos';
    case admision = 'admision';
    case donacion = 'donacion';
}

// Tabla niveles_academicos
enum Modalidad: string {
    case Internado = 'Internado';
    case Externo = 'Externo';
}

// Tabla componentes
enum TipoComponente: string {
    case hero = 'hero';
    case redirect = 'redirect';
    case section = 'section';
    case slider = 'slider';
    case timeline = 'timeline';
    case gallery = 'gallery';
}

// Tabla seccion_contenido
enum TipoSeccionContenido: string {
    case texto = 'texto';
    case imagen = 'imagen';
    case json = 'json';
    case html = 'html';
    case icono = 'icono';
    case enlace = 'enlace';
}

// Tabla archivos_multimedia
enum TipoMultimedia: string {
    case imagen = 'imagen';
    case video = 'video';
    case documento = 'documento';
    case audio = 'audio';
}

// Tabla donacion_metodos
enum TipoDonacion: string {
    case transferencia = 'transferencia';
    case yape = 'yape';
    case plin = 'plin';
    case efectivo = 'efectivo';
    case otro = 'otro';
}

// Tabla contacto_informacion
enum TipoContactoInformacion: string {
    case direccion = 'direccion';
    case telefono = 'telefono';
    case correo = 'correo';
    case whatsapp = 'whatsapp';
}

// Tabla navegacion_items
enum TipoNavegacion: string {
    case escritorio = 'escritorio';
    case movil = 'movil';
    case ambos = 'ambos';
}

// Tabla valores_institucionales
enum TipoValores: string {
    case valor = 'valor';
    case catolico = 'catolico';
    case practica = 'practica';
}

// Tabla configuracion_general
enum TipoConfiguracion: string {
    case texto = 'texto';
    case json = 'json';
    case imagen = 'imagen';
    case numero = 'numero';
    case boolean = 'boolean';
}

// Tabla atributos_institucionales
enum TipoEntidad: string {
    case valor = 'valor';
    case santo = 'santo';
    case practica = 'practica';
    case curso = 'curso';
}

// Tabla grados_nivel
enum Grado: string {
    case primero = '1ro';
    case segundo = '2do';
    case tercero = '3ro';
    case cuarto = '4to';
    case quinto = '5to';
    case sexto = '6to';
}

// Tablas redes_sociales
enum RedesSociales: string {
    case Facebook = 'Facebook';
    case Instagram = 'Instagram';
    case Twitter = 'Twitter';
    case YouTube = 'YouTube';
    case LinkedIn = 'LinkedIn';
    case TikTok = 'TikTok';
}

// Tabla testimonios
enum Seccion: string {
    case visitanos = 'visitanos';
    case general = 'general';
    case admision = 'admision';
    case donacion = 'donacion';
}
