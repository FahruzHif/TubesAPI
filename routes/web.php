<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeasiswaController;
use App\Http\Controllers\DaftarController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('beasiswa', [BeasiswaController::class, 'index'])->name('beasiswa.index');
Route::get('beasiswa/create', [BeasiswaController::class, 'create'])->name('beasiswa.create');
Route::resource('beasiswa', BeasiswaController::class);

Route::get('daftar', [DaftarController::class, 'index'])->name('daftar.index');
Route::get('daftar/create', [DaftarController::class, 'create'])->name('daftar.create');
Route::resource('daftar', DaftarController::class);
