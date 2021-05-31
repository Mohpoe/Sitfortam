@extends('layout.app')

@section('isi')
@if(session()->has('pesan'))
<div class="alert alert-info w-50">
	{{ session()->get('pesan') }}
</div>
@endif

<ul>
	<li>Nama: {{ $tamu->nama_tamu }}</li>
	<li>Jenis Kelamin: {{ $tamu->jenis_kelamin == 0 ? "Laki-laki" : "Perempuan" }}</li>
	<li>Jabatan: {{ $tamu->jabatan }}</li>
	<li>Instansi: {{ $tamu->instansi }}</li>
	<li>Petugas yang menerima: {{ $tamu->user }}</li>
	<li>Tujuan dan Keterangan: {{ $tamu->ket }}</li>
</ul>

<form action="{{ route('tamu.prosesTambah') }}" method="POST">
	@csrf
	<button type="submit" class="btn btn-primary my-2">Cetak Detail</button>
</form>
@endsection
