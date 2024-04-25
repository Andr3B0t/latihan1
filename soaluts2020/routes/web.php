<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MataKuliahController;

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
    return view('welcome');
});

Route::view('dashboard', 'dashboard')
    ->name('dashboard');

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('matakuliah', MataKuliahController::class);

Route::view('laporan', 'laporan.index')
    ->name('laporan');

Route::post('laporan/showInfoA', [MataKuliahController::class, 'showInfoA'])
    ->name('laporan.showInfoA');

Route::post('laporan/showInfoB', [MataKuliahController::class, 'showInfoB'])
    ->name('laporan.showInfoB');

Route::post('laporan/showInfoC', [MahasiswaController::class, 'showInfoC'])
    ->name('laporan.showInfoC');

Route::post('laporan/showInfoD', [MahasiswaController::class, 'showInfoD'])
    ->name('laporan.showInfoD');
