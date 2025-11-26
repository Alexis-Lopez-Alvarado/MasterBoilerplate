<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\PageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Rutas limpias para el MasterBoilerplate.
|
*/

Route::get('/', function () {
    return view('login');
})->name('login');

Route::get('/dashboard', [PageController::class, 'dashboard'])->name('dashboard');

// Mantenemos el ThemeSwitcher por si es necesario para los estilos oscuros/claros
Route::get('theme-switcher/{activeTheme}', [ThemeController::class, 'switch'])->name('theme-switcher');
