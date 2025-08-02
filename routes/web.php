<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Creación de rutas para el foro
// Ruta para llamar la funcióin de index y mostrar publicaciones o posteos
Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
// Ruta para crear el registro en BD de Posts
Route::post('/post', [App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
// Ruta pra el formulario de edición de posts
Route::get('/post/{post}/edit', [App\Http\Controllers\PostController::class, 'edit'])->name('posts.edit');
// Ruta para actualizar los post en la base de datos
Route::patch('/post/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('posts.update');
// Ruta para eliminar los posts o publicaciones
Route::delete('/post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('posts.destroy');

require __DIR__.'/auth.php';
