@extends('layout.app')

@section('isi')
<ul>
	<li>Nama: {{ $tamu->nama_tamu }}</li>
	<li>Jenis Kelamin: {{ $tamu->jenis_kelamin }}</li>
	<li>Jabatan: {{ $tamu->jabatan }}</li>
	<li>Instansi: {{ $tamu->instansi }}</li>
	<li>Petugas yang menerima: {{ $tamu->user }}</li>
</ul>
@endsection
