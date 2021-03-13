<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
	<div class="container">
		<a class="navbar-brand" href="{{ url('/') }}">
			{{ config('app.name', 'Laravel') }}
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<!-- Left Side Of Navbar -->
			<ul class="navbar-nav mr-auto">
					<li><a class="nav-link" href="/dashboard">Dashboard</a></li>
					<li><a class="nav-link" href="{!! route('noticia.create') !!}">Notícias</a></li>
					<li><a class="nav-link" href="{!! route('ficha.create') !!}">Fichas</a></li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Acervo</a>
						<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="{!! route('periodico.index') !!}">Consultar Periódicos</a></li>
						<li><a class="dropdown-item" href="{!! route('gerenciar.colecoes') !!}">Gerenciar Coleções</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item" href="#">Item adicional</a></li>
						</ul>
					</li>
					</li>
					<li>
						@can('isAdmin')
							<a class="nav-link registrar" href="{{ route('register') }}">{{ __('Usuários') }}</a>
						@endcan
					</li>
					
				<!-- @can('isEditor') -->
					<li class="nav-link"><a href="#periodicos">Periódicos</a></li>
				<!-- @endcan -->

			</ul>
			<!-- End of Left Side Of Navbar -->

			<!-- Right Side Of Navbar -->
			<ul class="navbar-nav ml-auto">
				<!-- Authentication Links -->
				@guest
					<li class="nav-item">
						<a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
					</li>
					@if (Route::has('register'))
						<li class="nav-item">
							<a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
						</li>
					@endif
				@else
					<li class="nav-item dropdown">
						<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
							{{ Auth::user()->nome }} <span class="caret"></span>
						</a>

						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
							<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">
								{{ __('Sair') }}
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									@csrf
							</form>
						</div>
					</li>
				@endguest
			</ul>
		</div>
	</div>
</nav>