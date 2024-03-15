<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/',  [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
Auth::routes();
Route::get('blog/{daftarpaket:id}',  [\App\Http\Controllers\HomeController::class, 'show'])->name('blog.show');

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('homepage');

Auth::routes();

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');
Route::resource('reservasi', \App\Http\Controllers\ReservasiController::class)->middleware('auth');
Route::resource('daftarpaket', \App\Http\Controllers\DaftarPaketController::class)->middleware('auth');
Route::resource('paketwisata', \App\Http\Controllers\PaketWisataController::class)->middleware('auth');
Route::resource('pelanggan', \App\Http\Controllers\PelangganController::class)->middleware('auth');
Route::resource('karyawan', \App\Http\Controllers\KaryawanController::class)->middleware('auth');
// Route::get('/dashboard/report', [ReportController::class, 'index'])
Route::get('create-pdf-file', [\App\Http\Controllers\ReportController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard.report.index');
Route::get('cetak', [\App\Http\Controllers\ReservasiController::class, 'cetak'])->middleware(['auth', 'verified'])->name('dashboard.report.index');
