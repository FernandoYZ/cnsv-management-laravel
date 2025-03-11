<?php

use App\Http\Controllers\Api\PaginaController;
use App\Http\Controllers\Api\ComponenteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::resource('pages', PaginaController::class)->only(['index', 'show', 'store', 'update', 'destroy']);

Route::resource('componentes', ComponenteController::class)->only(['index', 'show', 'store', 'update', 'destroy']);
