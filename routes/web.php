<?php

use App\Http\Controllers\ctController;
use App\Http\Controllers\JenisKriminalitasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\KejahatanController;
use App\Http\Controllers\unggahController;
use App\Http\Controllers\PetaController;
use App\Http\Controllers\ccController;
use App\Http\Controllers\detailController;
use App\Http\Controllers\KriminalitasController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\CrimeDataController;





Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/informasi', [InfoController::class, 'index'])->name('informasi');
Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik');
Route::get('/peta', [HomeController::class, 'peta'])->name('peta');
Route::get('/tentang_kami', [TentangController::class, 'index'])->name('tentang_kami');
Route::get('/kriminalitas', [KriminalitasController::class, 'index'])->name('kriminalitas')->middleware('auth');
Route::get('/jenis-kriminalitas', [JenisKriminalitasController::class, 'index'])->name('jenis-kriminalitas')->middleware('auth');
Route::get('/peta', [PetaController::class, 'index'])->name('peta');
Route::get('/kriminalitas/p21', [PetaController::class, 'getTotalP21']);
Route::get('/kriminalitas/rj', [PetaController::class, 'getTotalRJ']);
Route::get('/kriminalitas/sp2lid', [PetaController::class, 'getTotalSP2LID']);
Route::get('/kriminalitas/tahap-2', [PetaController::class, 'getTotalTahap2']);
Route::get('/kriminalitas/sp3', [PetaController::class, 'getTotalSP3']);
Route::get('/kriminalitas/ct', [PetaController::class, 'getct']);
Route::get('/kriminalitas/cct', [PetaController::class, 'getCCT']);
Route::get('/kriminalitas/pembunuhan', [PetaController::class, 'getpembunuhan']);
Route::get('/detail/{id}', [detailController::class, 'index']);
Route::match(['get', 'post'], '/admin', [AdminController::class, 'login'])->name('admin');
Route::get('/kriminalitas', [KriminalitasController::class, 'index'])->name('kriminalitas.index');
Route::get('/kriminalitas', [KriminalitasController::class, 'getall'])->name('kriminalitas');
Route::get('/kriminalitas/{id}/edit', [KriminalitasController::class, 'edit'])->name('kriminalitas.edit');
Route::put('/kriminalitas/update/{id}', [KriminalitasController::class, 'update'])->name('kriminalitas.update');
Route::get('/kriminalitas/create', [KriminalitasController::class, 'create'])->name('kriminalitas.create');
Route::post('/kriminalitas/create', [KriminalitasController::class, 'post'])->name('kriminalitas.post');
Route::delete('/kriminalitas/{id}', [KriminalitasController::class, 'destroy'])->name('kriminalitas.destroy');
Route::get('/kriminalitas/download', [KriminalitasController::class, 'download'])->name('kriminalitas.download');
Route::get('/peta', [PetaController::class, 'index'])->name('peta');
Route::get('/peta-1', [PetaController::class, 'showPeta1'])->name('peta_1');
Route::get('/peta-2', [PetaController::class, 'showPeta2'])->name('peta_2');
Route::get('/peta-3', [PetaController::class, 'showPeta3'])->name('peta_3');
Route::get('/jenis-kriminalitas/{crimeType}', [JenisKriminalitasController::class, 'getCrimeDataByType']);
Route::get('/jenis_kriminalitas', [JenisKriminalitasController::class, 'index'])->name('jenis_kriminalitas.index');
Route::get('/jenis_kriminalitas/{id}/edit', [JenisKriminalitasController::class, 'edit'])->name('jenis_kriminalitas.edit');
Route::get('/jenis_kriminalitas/create', [JenisKriminalitasController::class, 'create'])->name('jenis_kriminalitas.create');
Route::post('/jenis_kriminalitas/create', [JenisKriminalitasController::class, 'store'])->name('jenis_kriminalitas.post');
Route::delete('/jenis_kriminalitas/{id}', [JenisKriminalitasController::class, 'destroy'])->name('jenis_kriminalitas.destroy');
Route::get('/jenis_kriminalitas/download', [JenisKriminalitasController::class, 'download'])->name('jenis_kriminalitas.download');
Route::get('/crime-data', [GrafikController::class, 'showChart'])->name('chart');
Route::put('/jenis_kriminalitas/update/{id}', [JenisKriminalitasController::class, 'update'])->name('jenis_kriminalitas.update');