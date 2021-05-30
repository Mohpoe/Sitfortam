<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	public function __construct()
	{
		$this->middleware('initial');
	}

	public function masuk()
	{
		return view('user.login', ['judul' => 'Masuk']);
	}

	public function prosesMasuk(Request $request)
	{
		$validateData = $request->validate([
			'nama' => 'required|min:3|max:20',
			'password' => 'required',
		]);

		if (Auth::attempt($validateData)) {
			session(['nama' => $request->nama]);
			return redirect(route('tamu.beranda'))->with('pesan', 'Berhasil Masuk');
		} else {
			return redirect('/masuk')->with('pesan', "Gagal masuk!");
		}
	}

	public function daftar()
	{
		$this->authorize('create', User::class);
		return view('user.register', ['judul' => 'Daftar']);
	}

	public function prosesDaftar(Request $request)
	{
		$this->authorize('create', User::class);

		$validateData = $request->validate([
			'nama' => 'required|min:3|max:20|unique:users,nama',
			'nama_lengkap' => 'required',
			'jenis_kelamin' => 'required|in:0,1',
			'jabatan' => 'required',
			'password' => 'required|confirmed',
			'peran' => 'required|in:2,3',
		]);

		$user = new User;
		$user->nama = $request->nama;
		$user->nama_lengkap = $request->nama_lengkap;
		$user->jenis_kelamin = $request->jenis_kelamin;
		$user->jabatan = $request->jabatan;
		$user->password = Hash::make($request->password);
		$user->peran = $request->peran;
		$user->save();

		return redirect(route('user.daftar'))->with('pesan', "Pengguna dengan nama $request->nama telah ditambahkan!");
	}

	public function keluar()
	{
		session()->forget('nama');
		return redirect(route('user.masuk'))->with('pesan', 'Berhasil mengeluarkan akun');
	}

	public function ubah($nama)
	{
		$this->authorize('create', User::class);
		$user = User::where('nama',$nama)->first();
		return view('user.edit',['judul' => 'Ubah Pengguna','user' => $user]);
	}

	public function prosesUbah(Request $request, User $user)
	{
		$this->authorize('create', User::class);

		$validateData = $request->validate([
			'nama' => 'required|min:3|max:20|unique:users,nama,'.$user->id,
			'nama_lengkap' => 'required',
			'jenis_kelamin' => 'required|in:0,1',
			'jabatan' => 'required',
			'password' => 'confirmed',
			'peran' => 'required|in:2,3',
		]);

		User::where('id',$user->id)->update([
			'nama' => $request->nama,
			'nama_lengkap' => $request->nama_lengkap,
			'jenis_kelamin' => $request->jenis_kelamin,
			'jabatan' => $request->jabatan,
			'password' => ($request->password <> '' ? Hash::make($request->password) : $user->password),
			'peran' => $request->peran,
		]);

		return redirect(route('tamu.beranda'))->with('pesan',"Pengguna dengan nama $user->nama_lengkap telah diperbarui");
	}

	public function prosesHapus(User $user)
	{
		$user->delete();
		return redirect(route('tamu.beranda'))->with('pesan',"Pengguna dengan nama $user->nama_lengkap telah dihapus!");
	}

	public function test()
	{
		return view('test');
	}
}
