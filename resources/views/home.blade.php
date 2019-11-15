@extends('layouts.app')
@section('content')

<div class="container">
	<h2>Resultados encontrados: {{ $wordCount }}</h2>
	<table class="table">
			<thead>
				<tr>
					<th scope="col">Assunto</th>
					<th scope="col">Periódico</th>
					<th scope="col">Data</th>
					<th scope="col">Resumo</th>
					<th scope="col">Comentários</th>
				</tr>
			</thead>
		<tbody>
		@foreach ($resultadosBusca as $resultadoBusca)
			<tr>
				<td>{{ $resultadoBusca->assunto }}</td>
				<td>{{ $resultadoBusca->periodico }}</td>
				<td>{{ $resultadoBusca->data_edicao }}</td>
				<td>{{ $resultadoBusca->resumo }}</td>
				<td>{{ $resultadoBusca->comentarios }}</td>
			</tr>
		@endforeach
		</tbody>
	</table>
</div>

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
</div>
@endsection
