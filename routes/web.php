<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ArchivoController;
use App\Http\Controllers\HomeController;

// Autenticación
Auth::routes();
Route::get('/home', function () {
    return Auth::check() ? redirect()->route('dashboard') : redirect()->route('login');
})->name('home');

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/login/api', [LoginController::class, 'loginApi'])->name('login.api');

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Órdenes
    Route::resource('orders', OrderController::class);

    // Subida de archivos
    Route::get('subir-archivos', [ArchivoController::class, 'index'])->name('archivos.index');
    Route::post('subir-archivos', [ArchivoController::class, 'store'])->name('archivos.store');
});

// Validación front-end
Route::get('/front-validation', [HomeController::class, 'frontValidation'])->name('front-validation');

?>







