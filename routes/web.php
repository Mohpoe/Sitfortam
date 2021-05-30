<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TamuController;

Route::get('/',[TamuController::class,'index'])->name('tamu.beranda');
Route::get('/tamu',[TamuController::class,'bukuTamu'])->name('tamu.list');
Route::get('/tamu/tambah',[TamuController::class,'tambah'])->name('tamu.tambah');
Route::post('/tamu/tambah',[TamuController::class,'prosesTambah'])->name('tamu.prosesTambah');
Route::get('/tamu/{tamu}',[TamuController::class,'detail'])->name('tamu.detail');

Route::get('/masuk',[UserController::class,'masuk'])->name('user.masuk');
Route::post('/masuk',[UserController::class,'prosesMasuk'])->name('user.prosesMasuk');

Route::get('/daftar',[UserController::class,'daftar'])->name('user.daftar')->middleware('masuk');
Route::post('/daftar',[UserController::class,'prosesDaftar'])->name('user.prosesDaftar')->middleware('masuk');

Route::get('/keluar',[UserController::class,'keluar'])->name('user.keluar')->middleware('masuk');

Route::get('/ubah/{nama}',[UserController::class,'ubah'])->name('user.ubah')->middleware('masuk');
Route::patch('/ubah/{user}',[UserController::class,'prosesUbah'])->name('user.prosesUbah')->middleware('masuk');
Route::delete('/hapus/{nama}',[UserController::class,'prosesHapus'])->name('user.hapus')->middleware('masuk');

// Route::get('/test',[UserController::class,'test']);
Route::get('/test',function(){return view('test');});

// Route::patch('/mahasiswas/{mahasiswa}', [MahasiswaController::class,'update'])->name('mahasiswas.update');
// Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class,'destroy'])->name('mahasiswas.destroy');
