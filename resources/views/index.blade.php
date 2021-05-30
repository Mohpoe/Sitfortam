@extends('layout.app')

@php
use App\Models\User;
$jenis_peran = ['Developer','Administrator','Pejabat','Petugas Piket'];
// $peran = $users->where(['nama' => session()->get('nama')])->first()->peran;
$peran = User::where('nama',session()->get('nama'))->first()->peran;
$lebar_tabel = [7,7,6,6];
@endphp

@section('inline_menu')
<a href="{{ route('tamu.tambah') }}" class="btn btn-sm btn-success mr-2">
	+ Pengunjung
</a>
@can('create',User::class)
<a href="{{ route('user.daftar') }}" class="btn btn-sm btn-primary">
	+ Pengguna
</a>
@endcan
@endsection

@section('isi')
<div class="container">
	<div class="row">
		<div class="col-12">

			@if(session()->has('pesan'))
			<div class="alert alert-success" role="alert">
				{{ session()->get('pesan') }}
			</div>
			@endif

			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th><i>Username</i></th>
						<th>Nama Lengkap</th>
						<th>Jenis Kelamin</th>
						<th>Jabatan</th>
						<th>Peran</th>
						@if($peran <= 1) <th>Pilihan</th>
							@endif
					</tr>
				</thead>
				<tbody>
					@forelse($users as $user)
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td><code>{{ $user->nama }}</code></td>
						<td>{{ $user->nama_lengkap }}</td>
						<td>{{ $user->jenis_kelamin == 0 ? "Laki-laki" : "Perempuan" }}
						</td>
						<td>{{ $user->jabatan ?? 'N/A' }}</td>
						<td>{{ $jenis_peran[$user->peran] }}</td>
						@if($peran <= 1) <td>
							<a href="{{ route('user.ubah',['nama' => $user->nama]) }}"
								class="btn btn-sm btn-secondary">Ubah</a>
							<form action="{{ route('user.hapus',['nama' => $user->nama]) }}" method="post"
								class="d-inline">
								@method('DELETE')
								@csrf
								<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
							</form>
							</td>
							@endif
					</tr>
					@empty
					<td colspan="{{ $lebar_tabel[$peran] }}" class="text-center"><i>Tidak ada data...</i></td>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
