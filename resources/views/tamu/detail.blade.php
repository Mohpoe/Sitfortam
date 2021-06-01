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
	<li>Keterangan: {{ $tamu->ket }}</li>
	<li>Tujuan Kunjungan: {{ App\Models\User::where('nama',$tamu->tujuan)->first()->nama_lengkap }}</li>
</ul>

<form action="#" method="POST">
	@csrf
	<button type="submit" class="btn btn-primary my-2" @cannot('tambahTamu',App\Models\User::class) disabled @endcannot>Cetak Detail</button>
</form>
@endsection
