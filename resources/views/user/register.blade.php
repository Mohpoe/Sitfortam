@extends('layout.app')

@section('isi')
@if(session()->has('pesan'))
    <div class="alert alert-info w-50">
        {{ session()->get('pesan') }}
    </div>
@endif

<form action="{{ route('penggunas.prosesBuat') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" class="form-control w-50" id="nama" name="nama"
            value="{{ old('nama') }}">
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
        <label for="sandi">Sandi</label>
        <input type="password" class="form-control w-50" id="sandi" name="sandi"
            value="{{ old('sandi') }}">
        @error('sandi')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="sandi_confirmation">Konfirmasi Sandi</label>
        <input type="password" class="form-control w-50" id="sandi_confirmation" name="sandi_confirmation"
            value="{{ old('sandi_confirmation') }}">
        @error('sandi_confirmation')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary my-2">Buat Akun</button>
</form>
@endsection
