<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\MensajesEtiquetasController;
use App\Models\Mensaje;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () {
    return view('welcome');
}); */
Route::get('/', [MensajeController::class, 'index'])->name('welcome');


Route::get('/home',/* */ [MensajeController::class, 'index'])->middleware(['auth', 'verified'])->name('home');


Route::get('/nube', [EtiquetaController::class, 'index'])->middleware(['auth', 'verified'])->name('nube');

Route::get('/mensajes/#{nombre}', [MensajesEtiquetasController::class, 'index'])->name('etiqueta.show');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


