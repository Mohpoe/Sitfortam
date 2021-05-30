@extends('layout.app')

@section('inline_menu')
<a href="{{ route('tamu.tambah') }}" class="btn btn-sm btn-success mr-2">
	+ Pengunjung
</a>
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
						<th>Nama Pengunjung</th>
						<th>Instansi</th>
						<th>Petugas</th>
					</tr>
				</thead>
				<tbody>
					@forelse($tamus as $tamu)
					<tr>
						<th>{{ $loop->iteration }}</th>
						<td><a href="{{ route('tamu.detail',['tamu' => $tamu->id]) }}">{{ $tamu->nama_tamu }}</a></td>
						<td>{{ $tamu->instansi ?? 'N/A' }}</td>
						<td>{{ $tamu->user }}</td>
					</tr>
					@empty
					<td colspan="4" class="text-center"><i>Tidak ada data...</i></td>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection
