<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;

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

Route::post('/blog/store',[BlogController::class,'store'])->name('blog.store');

Route::get('/', [BlogController::class, 'index'])->name('blog.list');

Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');

Route::post('/blog/update/{id}',[BlogController::class,'update'])->name('blog.update');

Route::get('/blog/delete/{id}',[BlogController::class,'delete'])->name('blog.delete');
