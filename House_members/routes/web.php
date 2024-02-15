<?php

use App\Http\Controllers\HouseController;
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

Route::get('/', function () {
    return view('house');
});

Route::post('/member_name/store', [HouseController::class, 'store'])->name('member.store');

Route::get('/', [HouseController::class, 'index'])->name('book.list');


