<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\MensajeController;
use App\Http\Controllers\EtiquetaController;
use App\Http\Controllers\MensajesEtiquetasController;
use App\Models\Mensaje;
use Database\Seeders\MensajesEtiquetasSeeder;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('home');
})->name('welcome');
Route::get('/home',/* */ [MensajeController::class, 'index'])->name('home');
/* Route::get('/nube', [EtiquetaController::class, 'index'])->name('nube'); */
Route::get('/etiqueta/{nombre}', [MensajesEtiquetasController::class, 'index'])->name('etiqueta.show');

/* Route::post('/msgcreate', [MensajesEtiquetasController::class, 'create'])->middleware(['auth', 'verified'])->name('mensaje.create'); */
/* Route::post('/commentcreate', [ComentarioController::class, 'create'])->middleware(['auth', 'verified'])->name('comment.create'); */

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //ruta editar-eliminar mensajes y comentarios con middleware auth

});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/msgcreate', [MensajesEtiquetasController::class, 'create'])/* ->middleware(['auth', 'verified']) */->name('mensaje.create');
    Route::post('/commentcreate', [ComentarioController::class, 'create'])/* ->middleware(['auth', 'verified']) */->name('comment.create');
    Route::post('/deletemsg/{msg}', [MensajesEtiquetasController::class, 'destroy'])->name('msg.destroy');
    Route::post('/deletecomment/{comment}', [ComentarioController::class, 'destroy'])->name('comment.destroy');
});
//ruta editar-eliminar con middleware admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::post('/admin/editmsg/{msg}', [MensajesEtiquetasController::class, 'edit'])->name('admin.msg.edit');
    Route::post('/admin/storemsg', [MensajesEtiquetasController::class, 'store'])->name('admin.msg.store');
    Route::post('/admin/deletemsg/{msg}', [MensajesEtiquetasController::class, 'destroy'])->name('admin.msg.destroy');

    Route::post('/admin/editcomment/{comment}', [ComentarioController::class, 'edit'])->name('admin.comment.edit');
    Route::post('/admin/storecomment', [ComentarioController::class, 'store'])->name('admin.comment.store');
    Route::post('/admin/deletecomment/{comment}', [ComentarioController::class, 'destroy'])->name('admin.comment.destroy');
});

require __DIR__ . '/auth.php';
