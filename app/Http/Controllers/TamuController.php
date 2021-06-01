<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use App\Models\User;
use Illuminate\Http\Request;

class TamuController extends Controller
{
	public function __construct()
	{
		$this->middleware('initial');
		$this->middleware('masuk');
	}

    public function index()
	{
		$peran = User::where('nama',session()->get('nama'))->first()->peran;
		if ($peran == 0) {
			$show = User::where('nama','<>','admin')->get();
		} else {
			$show = User::where('peran','>',1)->get();
		}

		return view('index',['judul' => 'Tabel Daftar Pengguna','users' => $show]);
	}

	public function bukuTamu()
	{
		return view('tamu.list',['judul' => 'Buku Tamu', 'tamus' => Tamu::all()]);
	}

	public function tambah()
	{
		$this->authorize('tambahTamu', User::class);
		return view('tamu.register',['judul' => 'Tambah Info Tamu']);
	}

	public function prosesTambah(Request $request)
	{
		$this->authorize('tambahTamu', User::class);
		$validateData = $request->validate([
			'nama_tamu' => 'required|min:2|max:30',
			'jenis_kelamin' => 'required|in:0,1',
			'jabatan' => '',
			'instansi' => '',
			'ket' => 'required',
			'tujuan' => 'required',
		]);

		$tamu = new Tamu;
		$tamu->nama_tamu = $request->nama_tamu;
		$tamu->jenis_kelamin = $request->jenis_kelamin;
		$tamu->jabatan = $request->jabatan;
		$tamu->instansi = $request->instansi;
		$tamu->ket = $request->ket;
		$tamu->tujuan = $request->tujuan;
		$tamu->user = session()->get('nama');
		$tamu->save();
		$user_tujuan = User::where('nama',$request->tujuan)->first();
		$user_tujuan->status = '1';
		$user_tujuan->save();

		return redirect(route('tamu.list'))->with('pesan',"Berhasil menambahkan $request->nama_tamu sebagai pengunjung");
	}

	public function detail(Tamu $tamu)
	{
		return view('tamu.detail',['judul' => "Detail Kunjungan $tamu->nama_tamu", 'tamu' => $tamu]);
	}
}
