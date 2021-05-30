<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index()
	{
		// $me = User::where('peran','<>',0);
		// dump($me);
		return view('index',['judul' => 'Tabel Daftar Pengguna','users' => User::where('peran','<>','0')]);
	}
}
