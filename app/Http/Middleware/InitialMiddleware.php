<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function PHPUnit\Framework\isEmpty;

class InitialMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{
		$user = User::all();
		if ($user->isEmpty()) {
			$user = new User;
			$user->nama = 'admin';
			$user->nama_lengkap = 'Administrator';
			$user->jenis_kelamin = '0';
			$user->jabatan = null;
			$user->password = '$2y$10$dmrafj7Rvz.eeQ8mSdBIh.w7SVXQCCkcTpa8PYfWbnTWq/jTlfu/a';
			$user->peran = 0;
			$user->save();

			$list1 = [
				['rickyjaelani', 'Ricky Jaelani', '0',	'Koordinator Danus','2'],
				['aswar', 'Aswar', '0', 'Anggota Danus','2'],
				['ahmadsuyudi', 'Ahmad Suyudi', '0', 'Koordinator Litbang','2'],
				['sella', 'Sella Arzita', '1', 'Anggota Litbang','2'],
				['alif', 'Alif Rezky', '0', 'Petugas Piket','3'],
			];
			foreach ($list1 as $val) {
				$user = new User;
				$user->nama = $val[0];
				$user->nama_lengkap = $val[1];
				$user->jenis_kelamin = $val[2];
				$user->jabatan = $val[3];
				$user->password = Hash::make('admin');
				$user->peran = $val[4];
				$user->status = '0';
				$user->save();
			}

			return (session()->has('nama') ? redirect(route('user.keluar')) : $next($request));
		} else {
			return $next($request);
		}
	}
}
