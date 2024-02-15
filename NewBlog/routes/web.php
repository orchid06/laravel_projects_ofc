<?php

use App\Http\Controllers\NewBlogController;
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

Route::get('/', [NewBlogController::class,'index']);

Route::post('/store', [NewBlogController::class,'store'])->name('blog.store');

Route::get('blog/edit/{id}', [NewBlogController::class,'edit'])->name('blog.edit');

Route::post('blog/update/{id}', [NewBlogController::class,'update'])->name('blog.update');

Route::get('blog/delete/{id}', [NewBlogController::class,'delete'])->name('blog.delete');
