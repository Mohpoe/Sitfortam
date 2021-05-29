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
        <label for="nama">Nama Pengguna <i>(Username)</i></label>
        <input type="text" class="form-control w-50" id="nama" name="nama"
            value="{{ old('nama') }}" autofocus>
        @error('nama')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control w-50" id="nama_lengkap" name="nama_lengkap"
            value="{{ old('nama_lengkap') }}">
        @error('nama_lengkap')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

	<div class="form-group">
		<label>Jenis Kelamin</label>
		<div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="0" checked>
				<label class="form-check-label" for="laki_laki">Laki-laki</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="1">
				<label class="form-check-label" for="perempuan">Perempuan</label>
			</div>
		</div>
        @error('jenis_kelamin')
            <div class="text-danger">{{ $message }}</div>
        @enderror
	</div>

    <div class="form-group">
        <label for="jabatan">Jabatan</label>
        <input type="text" class="form-control w-50" id="jabatan" name="jabatan"
            value="{{ old('jabatan') }}">
        @error('jabatan')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Sandi</label>
        <input type="password" class="form-control w-50" id="password" name="password"
            value="{{ old('password') }}">
        @error('password')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password_confirmation">Konfirmasi Sandi</label>
        <input type="password" class="form-control w-50" id="password_confirmation" name="password_confirmation"
            value="{{ old('password_confirmation') }}">
        @error('password_confirmation')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

	<div class="form-group">
		<label>Peran</label>
		<div>
			<div class="form-check form-check">
				<input class="form-check-input" type="radio" name="peran" id="pejabat" value="2" checked>
				<label class="form-check-label" for="laki_laki">Pejabat</label>
			</div>
			<div class="form-check form-check">
				<input class="form-check-input" type="radio" name="peran" id="piket" value="3">
				<label class="form-check-label" for="perempuan">Petugas Piket</label>
			</div>
		</div>
        @error('peran')
            <div class="text-danger">{{ $message }}</div>
        @enderror
	</div>

    <button type="submit" class="btn btn-primary my-2">Buat Akun</button>
</form>
@endsection
