<?php

use App\Http\Controllers\{
    AdminController,
    CrimeDataController,
    detailController,
    GrafikController,
    HomeController,
    InfoController,
    JenisKriminalitasController,
    KejahatanController,
    KriminalitasController,
    PetaController,
    TentangController,
    unggahController
};
use Illuminate\Support\Facades\Route;

// Beranda dan Informasi 
Route::get('/', [HomeController::class, 'index'])->name('beranda');
Route::get('/informasi', [InfoController::class, 'index'])->name('informasi');
Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik');
Route::get('/tentang_kami', [TentangController::class, 'index'])->name('tentang_kami');

// Admin 
Route::match(['get', 'post'], '/admin', [AdminController::class, 'login'])->name('admin');

// Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/kriminalitas', [KriminalitasController::class, 'index'])->name('kriminalitas.index');
    Route::get('/jenis-kriminalitas', [JenisKriminalitasController::class, 'index'])->name('jenis-kriminalitas');
});

// Rute Kriminalitas
Route::prefix('kriminalitas')->group(function () {
    Route::get('/', [KriminalitasController::class, 'getall'])->name('kriminalitas')->middleware(middleware: 'auth');
    Route::get('/{id}/edit', [KriminalitasController::class, 'edit'])->name('kriminalitas.edit')->middleware(middleware: 'auth');
    Route::put('/update/{id}', [KriminalitasController::class, 'update'])->name('kriminalitas.update')->middleware(middleware: 'auth');
    Route::get('/create', [KriminalitasController::class, 'create'])->name('kriminalitas.create')->middleware(middleware: 'auth');
    Route::post('/create', [KriminalitasController::class, 'post'])->name('kriminalitas.post')->middleware(middleware: 'auth');
    Route::delete('/{id}', [KriminalitasController::class, 'destroy'])->name('kriminalitas.destroy')->middleware(middleware: 'auth');
    Route::get('/download', [KriminalitasController::class, 'download'])->name('kriminalitas.download')->middleware(middleware: 'auth');
    Route::get('/kriminalitas', [KriminalitasController::class, 'index'])->name('kriminalitas.index')->middleware(middleware: 'auth');

    // Data Kriminalitas
    Route::get('/p21', [PetaController::class, 'getTotalP21']);
    Route::get('/rj', [PetaController::class, 'getTotalRJ']);
    Route::get('/sp2lid', [PetaController::class, 'getTotalSP2LID']);
    Route::get('/tahap-2', [PetaController::class, 'getTotalTahap2']);
    Route::get('/sp3', [PetaController::class, 'getTotalSP3']);
    Route::get('/ct', [PetaController::class, 'getct']);
    Route::get('/cct', [PetaController::class, 'getCCT']);
    Route::get('/pembunuhan', [PetaController::class, 'getpembunuhan']);
});

// Rute Jenis Kriminalitas
Route::prefix('jenis-kriminalitas')->group(function () {
    Route::get('/', [JenisKriminalitasController::class, 'index'])->name('jenis-kriminalitas.index')->middleware(middleware: 'auth');
    Route::get('/{id}/edit', [JenisKriminalitasController::class, 'edit'])->name('jenis-kriminalitas.edit')->middleware(middleware: 'auth');
    Route::put('/update/{id}', [JenisKriminalitasController::class, 'update'])->name('jenis-kriminalitas.update')->middleware(middleware: 'auth');
    Route::get('/create', [JenisKriminalitasController::class, 'create'])->name('jenis-kriminalitas.create')->middleware(middleware: 'auth');
    Route::post('/create', [JenisKriminalitasController::class, 'store'])->name('jenis-kriminalitas.post')->middleware(middleware: 'auth');
    Route::delete('/{id}', [JenisKriminalitasController::class, 'destroy'])->name('jenis-kriminalitas.destroy')->middleware(middleware: 'auth');
    Route::get('/download', [JenisKriminalitasController::class, 'download'])->name('jenis-kriminalitas.download')->middleware(middleware: 'auth');
    Route::get('/{crimeType}', [JenisKriminalitasController::class, 'getCrimeDataByType']);
});

// Rute Peta
Route::prefix('peta')->group(function () {
    Route::get('/', [PetaController::class, 'index'])->name('peta');
    Route::get('/1', [PetaController::class, 'showPeta1'])->name('peta_1');
    Route::get('/2', [PetaController::class, 'showPeta2'])->name('peta_2');
    Route::get('/3', [PetaController::class, 'showPeta3'])->name('peta_3');
});

// Detail Data
Route::get('/detail/{id}', [detailController::class, 'index']);

// Grafik
Route::get('/crime-data', [GrafikController::class, 'showChart'])->name('chart');
