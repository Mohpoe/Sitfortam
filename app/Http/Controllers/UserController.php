<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
	public function masuk()
	{
		return view('user.login',['judul' => 'Masuk']);
	}

	public function prosesMasuk(Request $request)
	{
		$validateData = $request->validate([
			//
		]);
	}

	public function daftar()
	{
		return view('user.register',['judul' => 'Daftar']);
	}

	public function prosesDaftar(Request $request)
	{
		$validateData = $request->validate([
			'nama' => 'required|min:3|max:20|unique:users,nama',
			'nama_lengkap' => 'required',
			'jenis_kelamin' => 'required|in:0,1',
			'jabatan' => 'required',
			'sandi' => 'required|confirmed',
			'peran' => 'required|in:2,3',
		]);

		$user = new User;
		$user->nama = $request->nama;
		$user->nama_lengkap = $request->nama_lengkap;
		$user->jenis_kelamin = $request->jenis_kelamin;
		$user->jabatan = $request->jabatan;
		$user->sandi = Hash::make($request->sandi);
		$user->peran = $request->peran;
		$user->save();

		return "Berhasil menambah user";
	}
}
