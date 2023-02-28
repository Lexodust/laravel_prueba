<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('registro', [UsuarioController::class, 'registro']);
Route::post('login', [UsuarioController::class, 'login']);
Route::get('lista', [UsuarioController::class, 'lista']);




?>
