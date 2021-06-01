@extends('layout.app')

@php
use App\Models\User;
@endphp

@section('inline_menu')
@can('tambahTamu',User::class)
<a href="{{ route('tamu.tambah') }}" class="btn btn-sm btn-success mr-2">
	+ Pengunjung
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
						<th>Tanggal</th>
						<th>Nama Pengunjung</th>
						<th>Instansi</th>
						<th>Petugas</th>
					</tr>
				</thead>
				<tbody>
					@forelse($tamus as $tamu)
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td>{{ $tamu->created_at }}</td>
						<td><a href="{{ route('tamu.detail',['tamu' => $tamu->id]) }}">{{ $tamu->nama_tamu }}</a></td>
						<td>{{ $tamu->instansi ?? 'N/A' }}</td>
						<td>{{ User::where('nama',$tamu->user)->first()->nama_lengkap }}</td>
					</tr>
					@empty
					<td colspan="5" class="text-center"><i>Tidak ada data...</i></td>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
