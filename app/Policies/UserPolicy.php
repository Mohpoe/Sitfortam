<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
	use HandlesAuthorization;

	public function saya(User $user)
	{
		// HANYA DIRI SENDIRI YANG BISA UPDATE PROFIL HALAMAN PROFIL
		return ($user->nama === session()->get('nama'));
	}

	public function tambahTamu(User $user)
	{
		// KHUSUS UNTUK DEV DAN PETUGAS PIKET
		return ($user->peran === 0)
			or ($user->peran === 3);
	}

	public function viewAny(User $user)
	{
		//
	}

	public function view(User $user, User $model)
	{
		//
	}

	public function create(User $user)
	{
		// KHUSUS UNTUK DEV DAN ADMIN
		return ($user->peran === 0)
			or ($user->peran === 1);
	}

	public function update(User $user, User $model)
	{
		//
	}

	public function delete(User $user, User $model)
	{
		//
	}

	public function restore(User $user, User $model)
	{
		//
	}

	public function forceDelete(User $user, User $model)
	{
		//
	}
}
