<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ArsipController;

Route::get('/', [ArsipController::class, 'index'])->name('arsip.index');
Route::get('/arsip', [ArsipController::class, 'index'])->name('arsip.index');
Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
Route::post('/arsip', [ArsipController::class, 'store'])->name('arsip.store');
Route::get('/arsip/{id}', [ArsipController::class, 'show'])->name('arsip.show');
Route::get('/arsip/{id}/download', [ArsipController::class, 'download'])->name('arsip.download');
Route::delete('/arsip/{id}', [ArsipController::class, 'destroy'])->name('arsip.destroy');

use App\Http\Controllers\KategoriSuratController;
Route::get('/kategori', [KategoriSuratController::class, 'index'])->name('kategori.index');
Route::get('/kategori/create', [KategoriSuratController::class, 'create'])->name('kategori.create');
Route::post('/kategori', [KategoriSuratController::class, 'store'])->name('kategori.store');
Route::get('/kategori/{id}/edit', [KategoriSuratController::class, 'edit'])->name('kategori.edit');
Route::put('/kategori/{id}', [KategoriSuratController::class, 'update'])->name('kategori.update');
Route::delete('/kategori/{id}', [KategoriSuratController::class, 'destroy'])->name('kategori.destroy');
Route::get('/about', [ArsipController::class, 'about'])->name('about');
