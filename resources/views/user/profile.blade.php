@extends('layout.app')

@php
use App\Models\User;
$user = User::where('nama',session()->get('nama'))->first();
@endphp

@section('isi')
@if(session()->has('pesan'))
<div class="alert alert-info w-50">
	{{ session()->get('pesan') }}
</div>
@endif
@if ($user->peran == '2')
<h3 class="h4">Status Kehadiran</h3>
<div class="mb-4">
	<form action="{{ route('user.ubahStatus',['nama' => session()->get('nama')]) }}" method="post">
		@method('PATCH')
		@csrf
		<div class="form-group">
			<div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="status" id="ada" value="0"
						{{ (old('status') ?? $user->status) == 0 ? 'checked' : '' }}>
					<label class="form-check-label" for="ada">Ada</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="status" id="sibuk" value="1"
						{{ (old('status') ?? $user->status) == 1 ? 'checked' : '' }}>
					<label class="form-check-label" for="sibuk">Sibuk</label>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="radio" name="status" id="tidak_ada" value="2"
						{{ (old('status') ?? $user->status) == 2 ? 'checked' : '' }}>
					<label class="form-check-label" for="tidak_ada">Tidak Ada</label>
				</div>
			</div>
			@error('nama')
			<div class="invalid-tooltip">{{ $message }}</div>
			@enderror
		</div>

		<button type="submit" class="btn btn-primary my-2">Perbarui Status</button>
	</form>
</div>
<hr>
@endif
<h3 class="h4">Informasi Dasar</h3>
<ul>
	<li><i>Username:</i> <code>{{ $user->nama }}</code></li>
	<li>Nama Lengkap {{ $user->nama_lengkap }}</li>
	<li>Jenis Kelamin: {{ $user->jenis_kelamin == 0 ? "Laki-laki" : "Perempuan" }}</li>
	<li>Jabatan: {{ $user->jabatan }}</li>
</ul>
@endsection
