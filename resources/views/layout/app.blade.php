@php
	$judul = $judul ?? "";
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<title>
		{{ $judul == '' ? '' : $judul.' '.config('app.pemisah', '-').' ' }}{{ config('app.name', 'Sitfortam') }}
	</title>
</head>

<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav mr-auto">
					@if(session()->has('nama'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('tamu.beranda') }}">
								Beranda
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('user.daftar') }}">
								Daftar
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('user.keluar') }}">
								Keluar
							</a>
						</li>
					@else
						<li class="nav-item">
							<a class="nav-link" href="{{ route('user.masuk') }}">
								Masuk
							</a>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">

		<div class="py-4 d-flex justify-content-end align-items-center">
			<h1 class="h2 mr-auto">{{ $judul }}</h1>
			@yield('inline_menu')
		</div>

		@yield('isi')
	</div>
	<script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
