@extends('layout.app')

@php
	$jenis_peran = ['Developer','Administrator','Pejabat','Petugas Piket'];
	$peran = $users->where('nama',session()->get('nama'))->first()->peran;
	$lebar_tabel = [7,7,6,6];
@endphp

@section('inline_menu')
@can('create',App\Model\User::class)
	<a href="{{ route('user.daftar') }}" class="btn btn-primary">
		Tambah Pengguna
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
						@if($peran <= 1)
							<th>Pilihan</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@forelse($users as $user)
						<tr>
							<th>{{ $loop->iteration }}</th>
							<td>{{ $user->nama }}</td>
							<td>{{ $user->nama_lengkap }}</td>
							<td>{{ $user->jenis_kelamin == 0 ? "Laki-laki" : "Perempuan" }}
							</td>
							<td>{{ $user->jabatan }}</td>
							<td>{{ $jenis_peran[$user->peran] }}</td>
							@if($peran <= 1)
								<td>
									<a href="{{ route('user.ubah',['nama' => $user->nama]) }}" class="btn btn-sm btn-secondary">Ubah</a>
									<form action="{{ route('user.hapus',['nama' => $user->nama]) }}" method="post" class="d-inline">
										@method('DELETE')
										@csrf
										<button type="submit" class="btn btn-sm btn-danger">Hapus</button>
									</form>
								</td>
							@endif
						</tr>
					@empty
						<td colspan="{{ $lebar_tabel[$peran] }}" class="text-center">Tidak ada data...</td>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
