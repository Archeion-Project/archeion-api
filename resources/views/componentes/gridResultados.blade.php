<table class="table table-sm table-hover">
	<thead class="stick-head">
		<tr>
			<th scope="col-2">Assunto</th>
			<th scope="col-2">Periódico</th>
			<th scope="col-2">Data</th>
			<th scope="col-4">Resumo</th>
			<th scope="col-2">Comentários</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($resultadosBusca as $resultadoBusca)
			<tr>
				<td>{{ $resultadoBusca->assunto }}</td>
				<td>{{ \App\Periodico::find($resultadoBusca->periodico_id)->titulo }}</td>
				<td>{{ (new \Carbon\Carbon($resultadoBusca->data_edicao))->format('d/m/Y') }}</td>
				<td>{{ $resultadoBusca->resumo }}</td>
				<td>{{ $resultadoBusca->comentario }}</td>
			</tr>
		@endforeach
	</tbody>
</table>