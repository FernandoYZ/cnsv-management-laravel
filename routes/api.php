<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/pages', function() {
    return 'Obteniendo lista de páginas';
});

Route::get('/pages/{id}', function() {
    return 'Obteniendo una página';
});

Route::post('/pages', function() {
    return 'Creando una nueva página';
});

Route::put('/pages/{id}', function() {
    return 'Actualizando una página';
});

Route::delete('/pages/{id}', function() {
    return 'Eliminando una página';
});
