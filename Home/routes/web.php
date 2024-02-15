<?php

use App\Http\Controllers\HomeController;
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

Route::post('/',[HomeController::class, 'index']);


Route::post('/store',      [HomeController::class, 'store']) ->name('member.store');

Route::get('/edit/{id}',   [HomeController::class, 'edit'])  ->name('member.edit');

Route::post('/update/{id}',[HomeController::class, 'update'])->name('member.update');

Route::get('/delete/{id}', [HomeController::class, 'delete'])->name('member.delete');

Route::post('/search',     [HomeController::class, 'search']) ->name('member.search');
