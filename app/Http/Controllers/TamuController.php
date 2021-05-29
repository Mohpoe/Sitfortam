<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class TamuController extends Controller
{
    public function index()
	{
		return view('index',['judul' => 'Tabel Daftar Pengguna','users' => User::all()]);
	}
}
