<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DaftarBarangController;
use App\Http\Controllers\CekPersediaanController;
use App\Http\Controllers\ManajemenBarangController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('manajemen_barang', ManajemenBarangController::class)->middleware('role:admin');

Route::resource('daftar_barang', DaftarBarangController::class);

Route::resource('/cek_persediaan', [CekPersediaanController::class, 'index'])->middleware('role:admin')->name('cek_persediaan.index');
Route::resource('/cek_persediaan/under80', [CekPersediaanController::class, 'under80'])->middleware('role:admin')->name('cek_persediaan.under80');




require __DIR__.'/auth.php';
