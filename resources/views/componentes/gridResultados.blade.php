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
