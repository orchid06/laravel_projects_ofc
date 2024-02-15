<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::post('/book/store',[BookController::class,'store'])->name('book.store');

Route::get('/', [BookController::class, 'index'])->name('book.list');

Route::get('book/edit/{id}', [BookController::class, 'edit'])->name('book.edit');

Route::post('/book/update/{id}',[BookController::class,'update'])->name('book.update');

Route::get('/book/delete/{id}',[BookController::class,'delete'])->name('book.delete');

