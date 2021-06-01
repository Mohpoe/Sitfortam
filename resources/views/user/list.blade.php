@extends('layout.app')

@php
use App\Models\User;
$jenis_peran = ['Developer','Administrator','Pejabat','Petugas Piket'];
$peran = User::where('nama',session()->get('nama'))->first()->peran;
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
						<th>Pilihan</th>
					</tr>
				</thead>
				<tbody>
					@forelse($users as $user)
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td><code>{{ $user->nama }}</code></td>
						@php
						$s = $user->status;
						$ket_status = ['Ada','Sibuk','Tidak ada'];
						$ket_badge = ['success','warning','danger'];
						@endphp
						<td>
							<div class="badge badge-{{ $ket_badge[$s] }} mr-2">{{ $ket_status[$s] }}</div>
							{{ $user->nama_lengkap }}
						</td>
						<td>{{ $user->jenis_kelamin == 0 ? "Laki-laki" : "Perempuan" }}
						</td>
						<td>{{ $user->jabatan ?? 'N/A' }}</td>
						<td>{{ $jenis_peran[$user->peran] }}</td>
						<td>
							@if($peran <= 1)
								<a href="{{ route('user.ubah',['nama' => $user->nama]) }}" class="btn btn-sm btn-secondary">Ubah</a>
								<form action="{{ route('user.hapus',['nama' => $user->nama]) }}" method="post"
									class="d-inline">
									@method('DELETE')
									@csrf
									<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
								</form>
							@endif
							<a href="{{ route('tamu.tambah',['id' => Illuminate\Support\Facades\Hash::make($user->nama)]) }}" class="btn btn-sm btn-success">Kunjungi</a>
						</td>
					</tr>
					@empty
					<td colspan="7" class="text-center"><i>Tidak ada data...</i></td>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
