<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[BookController::class, 'index']) -> name('list');
Route::get('/book/{id}/show',[BookController::class, 'show']) -> name('show.book');
Route::get('/book/{id}/update', [BookController::class, 'edit'])->name('book.edit');
Route::post('/book/{id}/update',[BookController::class, 'update'])->name('book.update');
Route::get('/book/{id}/delete',[BookController::class, 'destroy'])->name('book.delete');
Route::get('/book/create',[BookController::class, 'create'])->name('book.create');
Route::post('/book/create',[BookController::class, 'addbook'])->name('book.addbook');
