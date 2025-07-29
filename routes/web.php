<?php

use App\Http\Controllers\CursoController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AlumnoCursoController;
use App\Http\Controllers\DiplomaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Ruta pública principal
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('home');
    }
    return view('welcome'); // Aquí pones la vista pública con botón login
});

use App\Http\Controllers\ProfileController;



// Ruta protegida para usuarios autenticados
Route::get('/home', function () {
    return view('dashboard'); // Aquí tu vista de dashboard
})->middleware('auth')->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



// Rutas protegidas solo para admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('alumnos', AlumnoController::class);
    Route::resource('cursos', CursoController::class);
    Route::resource('alumno-curso', AlumnoCursoController::class);
    Route::resource('diplomas', DiplomaController::class);

    Route::get('diplomas/{id}/descargar', [DiplomaController::class, 'pdf'])->name('diplomas.descargar');
Route::get('/diplomas/{id}/enviar', [DiplomaController::class, 'enviar'])->name('diplomas.enviar');

    Route::get('/test', function () {
        return 'PASASTE EL MIDDLEWARE';
    });
});
require __DIR__.'/auth.php';
