<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TamuController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

Route::get('/', [TamuController::class, 'index'])->name('tamu.beranda');
Route::get('/tamu', [TamuController::class, 'bukuTamu'])->name('tamu.list');
Route::get('/tamu/tambah', [TamuController::class, 'tambah'])->name('tamu.tambah');
Route::post('/tamu/tambah', [TamuController::class, 'prosesTambah'])->name('tamu.prosesTambah');
Route::get('/tamu/{tamu}', [TamuController::class, 'detail'])->name('tamu.detail');

Route::get('/masuk', [UserController::class, 'masuk'])->name('user.masuk');
Route::post('/masuk', [UserController::class, 'prosesMasuk'])->name('user.prosesMasuk');

Route::get('/daftar', [UserController::class, 'daftar'])->name('user.daftar')->middleware('masuk');
Route::post('/daftar', [UserController::class, 'prosesDaftar'])->name('user.prosesDaftar')->middleware('masuk');

Route::get('/keluar', [UserController::class, 'keluar'])->name('user.keluar')->middleware('masuk');

Route::get('/ubah/{nama}', [UserController::class, 'ubah'])->name('user.ubah')->middleware('masuk');
Route::patch('/ubah/{user}', [UserController::class, 'prosesUbah'])->name('user.prosesUbah')->middleware('masuk');
Route::delete('/hapus/{nama}', [UserController::class, 'prosesHapus'])->name('user.hapus')->middleware('masuk');

// Route::get('/test',[UserController::class,'test']);
Route::get('/test', function () {
	return view('test');
});

Route::get('/generate-users', function () {
	$list1 = [
		['rickyjaelani', 'Ricky Jaelani', '0',	'Koordinator Danus',],
		['aswar', 'Aswar', '0', 'Anggota Danus',],
		['ahmadsuyudi', 'Ahmad Suyudi', '0', 'Koordinator Litbang',],
		['sella', 'Sella Arzita', '1', 'Anggota Litbang',],
		['alif', 'Alif Rezky', '0', 'Petugas Piket',],
	];
	foreach ($list1 as $val) {
		$user = new User;
		$user->nama = $val[0];
		$user->nama_lengkap = $val[1];
		$user->jenis_kelamin = $val[2];
		$user->jabatan = $val[3];
		$user->password = Hash::make('admin');
		$user->peran = 2;
		$user->status = 0;
		$user->save();
	}
	return redirect(route('tamu.beranda'))->with('pesan', "Auto add users");
});

// Route::patch('/mahasiswas/{mahasiswa}', [MahasiswaController::class,'update'])->name('mahasiswas.update');
// Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class,'destroy'])->name('mahasiswas.destroy');
