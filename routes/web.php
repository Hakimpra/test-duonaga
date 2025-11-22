<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\GradeController;

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
    return view('index');
});

// karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
Route::get('/karyawan/add', [KaryawanController::class, 'create'])->name('karyawan.add');
Route::post('/karyawan/add', [KaryawanController::class, 'store']);
Route::get('/karyawan/delete/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.del');
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::post('/karyawan/edit/{id}', [KaryawanController::class, 'store']);
//filter date
Route::get('/karyawan/date', [KaryawanController::class, 'date'])->name('karyawan.date');
// grade
Route::get('/grade', [GradeController::class, 'index'])->name('grade');
Route::get('/grade/add', [GradeController::class, 'create'])->name('grade.add');
Route::post('/grade/add', [GradeController::class, 'store']);
Route::get('/grade/edit/{id}', [GradeController::class, 'edit'])->name('grade.edit');
Route::post('/grade/edit/{id}', [GradeController::class, 'store']);
Route::get('/grade/delete/{id}', [GradeController::class, 'destroy'])->name('grade.del');

// produk
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/add', [ProdukController::class, 'create'])->name('produk.add');
Route::post('/produk/add', [ProdukController::class, 'store']);
Route::get('/produk/delete/{id}', [ProdukController::class, 'destroy'])->name('produk.del');
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk.edit');
Route::post('/produk/edit/{id}', [ProdukController::class, 'store']);
//filter date
Route::get('/produk/date', [ProdukController::class, 'date'])->name('produk.date');