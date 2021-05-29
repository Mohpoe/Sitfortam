<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TamuController;

Route::get('/',[TamuController::class,'index'])->name('tamu.beranda')->middleware('masuk');

Route::get('/masuk',[UserController::class,'masuk'])->name('user.masuk');
Route::post('/masuk',[UserController::class,'prosesMasuk'])->name('user.prosesMasuk');

Route::get('/daftar',[UserController::class,'daftar'])->name('user.daftar');
Route::post('/daftar',[UserController::class,'prosesDaftar'])->name('user.prosesDaftar');

Route::get('/keluar',[UserController::class,'keluar'])->name('user.keluar')->middleware('masuk');
