@extends('layout.app')

@section('isi')
<div class="container mb-2">
	@if(session()->has('pesan'))
	<div class="alert alert-info w-50">
		{{ session()->get('pesan') }}
	</div>
	@endif

	<form action="{{ route('tamu.prosesTambah') }}" method="POST">
		@csrf

		<div class="form-group">
			<label for="nama_tamu">Nama Tamu</label>
			<input type="text" class="form-control w-50" id="nama_tamu" name="nama_tamu" value="{{ old('nama_tamu') }}"
				autofocus>
			@error('nama_tamu')
			<div class="text-danger">{{ $message }}</div>
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
			<div class="text-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group">
			<label for="jabatan">Jabatan</label>
			<input type="text" class="form-control w-50" id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
			@error('jabatan')
			<div class="text-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group">
			<label for="instansi">Instansi/Perwakilan</label>
			<input type="text" class="form-control w-50" id="instansi" name="instansi" value="{{ old('instansi') }}">
			@error('instansi')
			<div class="text-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group">
			<label for="instansi">Tujuan/Keterangan</label>
			<textarea class="form-control w-50" name="ket" id="ket" rows="3">{{ old('ket') }}</textarea>
			@error('instansi')
			<div class="text-danger">{{ $message }}</div>
			@enderror
		</div>

		<div class="form-group">
			<label>Tujuan Kunjungan</label>
			<div>
				@if (App\Models\User::where('peran',2)->get()->isEmpty())
				<div class="form-control-plaintext w-50">Tidak ada data!</div>
				@else
				@foreach (App\Models\User::where('peran',2)->get() as $pejabat)
				<div class="form-check">
					<input type="radio" name="tujuan" id="{{ $pejabat->nama }}" class="form-check-input" {{ old('tujuan') == $pejabat->nama ? 'checked' : '' }}
						value="{{ $pejabat->nama }}">
					<label for="{{ $pejabat->nama }}" class="form-check-label">{{ $pejabat->nama_lengkap }}</label>
				</div>
				@endforeach
				@endif
			</div>
			@error('tujuan')
			<div class="text-danger">{{ $message }}</div>
			@enderror
		</div>

		<button type="submit" class="btn btn-primary my-2">Tambah ke Buku Tamu</button>
	</form>
</div>
@endsection
