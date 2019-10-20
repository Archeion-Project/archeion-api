<!doctype html>
<html lang="{{ app()->getLocale() }}">
	<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>WebBiblioteca</title>
		<link href="css/bootstrap.css" rel="stylesheet" />
		<link href="css/coming-sssoon.css" rel="stylesheet" />
		<style>
			.navbar {
				background: transparent !important;
			}
		</style>
	</head>
	<body>
		<ul class="nav">
			<li class="nav-item">
				<a class="nav-link active" href="#">
					Acervo
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					Localização
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					Contato
				</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">
					Acessibilidade
				</a>
			</li>
		</ul>

		<form action="/foo/bar" method="POST">
			@csrf
			@method('PUT')
				<div class="container">
					<div class="form-group">
						<input type="text" class="form-control" name="termoBusca" placeholder="O que você procura?" aria-label="Recipient's username" aria-describedby="button-addon2">
					</div>
				<button type="submit" class="btn btn-primary">Pesquisar</button>
				</div>
		</form>



	<!-- /.navbar-collapse -->
		<!-- <div class="flex-center position-ref full-height">
			@if (Route::has('login'))
				<div class="top-right links">
					@auth
						<a href="{{ url('/home') }}">Home</a>
					@else
						<a href="{{ route('login') }}">Login</a>
						@can('isAdmin')
						<a href="{{ route('register') }}">Register</a>
						@endcan
					@endauth
				</div>
			@endif

			<div class="content">

			@can('isAdmin')
			<li><a href="#dashboard"></a>dashboard</li>
			<li><a href="#new-post"></a>new post</li>
			<li><a href="#edit"></a>edit</li>
			<li><a href="#delete"></a>delete</li>
			<a href="/buscar"><button>Buscar</button></a>
			@endcan

			@can('isEditor')
			<li><a href="#dashboard"></a>dashboard</li>
			<li><a href="#new-post"></a>new post</li>
			<li><a href="#edit"></a>edit</li>
			@endcan

			<li><a href="#dashboard"></a>dashboard</li>

		</div> -->
	</body>
</html>