@extends('layout.app')

@section('inline_menu')
@can('tambahTamu',App\Models\User::class)
<a href="{{ route('tamu.tambah') }}" class="btn btn-sm btn-success mr-2">
	+ Tamu
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
						@can('tambahTamu',App\Models\User::class)
						<th>Pilihan</th>
						@endcan
					</tr>
				</thead>
				<tbody>
					@forelse($users as $user)
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td><code>{{ $user->nama }}</code></td>
						@php
						$s = $user->status ?? '0';
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
						@can('tambahTamu',App\Models\User::class)
						<td><a href="{{ route('tamu.tambah',['id' => Illuminate\Support\Facades\Hash::make($user->nama)]) }}"
								class="btn btn-sm btn-success {{ $user->status == '0' ? '' : 'disabled' }}">Kunjungi</a>
						</td>
						@endcan
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
