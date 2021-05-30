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
			$user->password = Hash::make('admin');
			$user->peran = 0;
			$user->save();
			return $next($request);
		} else {
			return $next($request);
		}


    }
}
