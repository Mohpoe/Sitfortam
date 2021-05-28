<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link href="/css/bootstrap.min.css" rel="stylesheet">
	<title>Sistem Informasi Tamu</title>
</head>

<body>
	<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbar">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a class="nav-link" href="#">
							Menu 1
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
							Menu 2
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">
							Menu 3
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		<h2 class="my-4">{{ $judul }}</h2>

		<hr>

		@yield('isi')

	</div>
	<script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
