<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TamuController;

Route::get('/',[TamuController::class,'index'])->name('tamu.beranda')->middleware('masuk');

Route::get('/masuk',[UserController::class,'masuk'])->name('user.masuk');
Route::post('/masuk',[UserController::class,'prosesMasuk'])->name('user.prosesMasuk');

Route::get('/daftar',[UserController::class,'daftar'])->name('user.daftar')->middleware('masuk');
Route::post('/daftar',[UserController::class,'prosesDaftar'])->name('user.prosesDaftar')->middleware('masuk');

Route::get('/keluar',[UserController::class,'keluar'])->name('user.keluar')->middleware('masuk');

Route::get('/ubah/{nama}',[UserController::class,'ubah'])->name('user.ubah')->middleware('masuk');
Route::patch('/ubah/{user}',[UserController::class,'prosesUbah'])->name('user.prosesUbah')->middleware('masuk');
Route::delete('/hapus/{nama}',[UserController::class,'prosesHapus'])->name('user.hapus')->middleware('masuk');

Route::get('/test',[UserController::class,'test']);
// Route::patch('/mahasiswas/{mahasiswa}', [MahasiswaController::class,'update'])->name('mahasiswas.update');

// Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class,'destroy'])->name('mahasiswas.destroy');
