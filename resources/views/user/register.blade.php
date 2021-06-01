@extends('layout.app')

@section('isi')
@if(session()->has('pesan'))
<div class="alert alert-info w-50">
	{{ session()->get('pesan') }}
</div>
@endif

<form action="{{ route('user.prosesDaftar') }}" method="POST">
	@csrf

	<div class="form-group">
		<label for="nama">Nama Pengguna</label>
		<input type="text" class="form-control w-50" id="nama" name="nama"
			placeholder="Hanya huruf kecil dan angka, harus diawali dengan huruf" value="{{ old('nama') }}" autofocus>
			<small class="form-text text-muted">Hanya huruf kecil dan angka, harus diawali dengan huruf</small>
		@error('nama')
		<div class="invalid-tooltip">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="nama_lengkap">Nama Lengkap</label>
		<input type="text" class="form-control w-50" id="nama_lengkap" name="nama_lengkap"
			placeholder="Masukkan nama lengkap" value="{{ old('nama_lengkap') }}">
		@error('nama_lengkap')
		<div class="invalid-tooltip">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label>Jenis Kelamin</label>
		<div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="0"
					{{ old('jenis_kelamin') == 0 ? 'checked' : (old('jenis_kelamin') == 1 ? '' : 'checked') }}>
				<label class="form-check-label" for="laki_laki">Laki-laki</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="1"
					{{ old('jenis_kelamin') == 1 ? 'checked' : '' }}>
				<label class="form-check-label" for="perempuan">Perempuan</label>
			</div>
		</div>
		@error('jenis_kelamin')
		<div class="invalid-tooltip">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="jabatan">Jabatan</label>
		<input type="text" class="form-control w-50" id="jabatan" name="jabatan" placeholder="Masukkan nama jabatan"
			value="{{ old('jabatan') }}">
		@error('jabatan')
		<div class="invalid-tooltip">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="password">Sandi</label>
		<input type="password" class="form-control w-50" id="password" name="password" value="{{ old('password') }}">
		@error('password')
		<div class="invalid-tooltip">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label for="password_confirmation">Konfirmasi Sandi</label>
		<input type="password" class="form-control w-50" id="password_confirmation" name="password_confirmation"
			value="{{ old('password_confirmation') }}">
		@error('password_confirmation')
		<div class="invalid-tooltip">{{ $message }}</div>
		@enderror
	</div>

	<div class="form-group">
		<label>Peran</label>
		<div>
			@if (App\Models\User::where('nama',session()->get('nama'))->first()->peran == 0)
			<div class="form-check">
				<input type="radio" name="peran" id="admin" class="form-check-input" value="1">
				<label for="admin" class="form-check-label">Admin</label>
			</div>
			@endif
			<div class="form-check">
				<input class="form-check-input" type="radio" name="peran" id="pejabat" value="2" checked>
				<label class="form-check-label" for="pejabat">Pejabat</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="peran" id="piket" value="3">
				<label class="form-check-label" for="piket">Petugas Piket</label>
			</div>
		</div>
		@error('peran')
		<div class="invalid-tooltip">{{ $message }}</div>
		@enderror
	</div>

	<button type="submit" class="btn btn-primary my-2">Buat Akun</button>
</form>
@endsection
