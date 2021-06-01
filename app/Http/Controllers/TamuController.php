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
		return view('index',['judul' => 'Tabel Daftar Pejabat','users' => User::where('peran','2')->get()]);
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

		$user_tujuan = User::where('nama',$request->tujuan)->first();
		if ($user_tujuan->status = '0') {
			$user_tujuan->status = '1';
			$user_tujuan->save();

			$tamu = new Tamu;
			$tamu->nama_tamu = $request->nama_tamu;
			$tamu->jenis_kelamin = $request->jenis_kelamin;
			$tamu->jabatan = $request->jabatan;
			$tamu->instansi = $request->instansi;
			$tamu->ket = $request->ket;
			$tamu->tujuan = $request->tujuan;
			$tamu->user = session()->get('nama');
			$tamu->save();

			return redirect(route('tamu.list'))->with('pesan',"Berhasil menambahkan $request->nama_tamu sebagai pengunjung");
		} else {
			return redirect(route('tamu.tambah'))->with('pesan',"$user_tujuan->nama_lengkap tidak dapat dikunjungi saat ini");
		}

	}

	public function detail(Tamu $tamu)
	{
		return view('tamu.detail',['judul' => "Detail Kunjungan $tamu->nama_tamu", 'tamu' => $tamu]);
	}
}
