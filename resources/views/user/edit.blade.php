@extends('layout.app')

@section('isi')
@if(session()->has('pesan'))
    <div class="alert alert-info w-50">
        {{ session()->get('pesan') }}
    </div>
@endif
<form action="{{ route('user.prosesUbah',['user' => $user->id]) }}" method="POST">
	@method('PATCH')
    @csrf

    <div class="form-group">
        <label for="nama">Nama Pengguna</label>
        <input type="text" class="form-control w-50" id="nama" name="nama" placeholder="Hanya huruf kecil dan angka, harus diawali dengan huruf"
            value="{{ old('nama') ?? $user->nama }}" autofocus>
			<small class="form-text text-muted">Hanya huruf kecil dan angka, harus diawali dengan huruf</small>
        @error('nama')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control w-50" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan nama lengkap"
            value="{{ old('nama_lengkap') ?? $user->nama_lengkap }}">
        @error('nama_lengkap')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

	<div class="form-group">
		<label>Jenis Kelamin</label>
		<div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="jenis_kelamin" id="laki_laki" value="0" {{ (old('jenis_kelamin') ?? $user->jenis_kelamin) == 0 ? 'checked' : '' }}>
				<label class="form-check-label" for="laki_laki">Laki-laki</label>
			</div>
			<div class="form-check form-check-inline">
				<input class="form-check-input" type="radio" name="jenis_kelamin" id="perempuan" value="1" {{ (old('jenis_kelamin') ?? $user->jenis_kelamin) == 1 ? 'checked' : '' }}>
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
            value="{{ old('jabatan') ?? $user->jabatan }}">
        @error('jabatan')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password">Sandi <small><i>(Opsional)</i></small></label>
        <input type="password" class="form-control w-50" id="password" name="password"
            value="{{ old('password') }}">
        @error('password')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="password_confirmation">Konfirmasi Sandi <small><i>(Opsional)</i></small></label>
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
					<input type="radio" name="peran" id="admin" class="form-check-input" value="1" {{ (old('peran') ?? $user->peran) == 1 ? 'checked' : '' }}>
					<label for="admin" class="form-check-label">Admin</label>
				</div>
			@endif
			<div class="form-check">
				<input class="form-check-input" type="radio" name="peran" id="pejabat" value="2" {{ (old('peran') ?? $user->peran) == 2 ? 'checked' : '' }}>
				<label class="form-check-label" for="pejabat">Pejabat</label>
			</div>
			<div class="form-check">
				<input class="form-check-input" type="radio" name="peran" id="piket" value="3" {{ (old('peran') ?? $user->peran) == 3 ? 'checked' : '' }}>
				<label class="form-check-label" for="piket">Petugas Piket</label>
			</div>
		</div>
        @error('peran')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
	</div>

	@if ($user->peran == 2)
	<div class="form-group">
		<label>Status Kehadiran</label>
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
	@endif

    <button type="submit" class="btn btn-primary my-2">Simpan</button>
</form>
@endsection
