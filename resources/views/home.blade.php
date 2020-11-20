@extends('layouts.app')

{!! $navbar !!}

<div class="container">
	<div class="barraBusca">

		{!! $barraBusca !!}

		<h2>Resultados encontrados para "{!! $termoBusca !!}": {{ $wordCount }}</h2>

	</div>

	<div class="gridResultados">

		{!! $gridResultados !!}

	</div>


	@if(Auth::user())
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">Dashboard</div>

					<div class="card-body">
						@if (session('status'))
							<div class="alert alert-success" role="alert">
								{{ session('status') }}
							</div>
						@endif

						You are logged in!
					</div>
				</div>
			</div>
		</div>
	@endif
</div>