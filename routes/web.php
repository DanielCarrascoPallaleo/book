<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Route::get('/', function () {
//     return Inertia::render('Welcome');
// })->name('home');

Route::get('/', [BookController::class, 'index'])->name('books.index');

// Rutas para crear libros
Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
Route::post('/books', [BookController::class, 'store'])->name('books.store');

// Rutas para editar y actualizar libros
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

// Ruta para eliminar libros
Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

// Ruta para ver un libro
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');