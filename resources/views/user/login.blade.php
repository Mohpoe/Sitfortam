@extends('layout.app')

@section('isi')
@if(session()->has('pesan'))
    <div class="alert alert-info w-50">
        {{ session()->get('pesan') }}
    </div>
@endif

<form action="{{ route('user.prosesMasuk') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="nama">Nama Pengguna</label>
        <input type="text" class="form-control w-50" id="nama" name="nama"
            value="{{ old('nama') }}">
        @error('nama')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="sandi">Kata Sandi</label>
        <input type="password" class="form-control w-50" id="sandi" name="password"
            value="{{ old('sandi') }}">
        @error('sandi')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary my-2">Masuk</button>
</form>
@endsection
