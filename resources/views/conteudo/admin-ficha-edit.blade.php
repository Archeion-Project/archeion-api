@extends('layouts.app')

@section('content')

<div class="container col-sm">
	<form action="{!! route('ficha.update', $ficha) !!}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PATCH')
		<br>
		<h2>Editar Ficha Catalográfica</h2>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="inputAssunto">Assunto</label>
				<input type="text" class="form-control" id="edit-assunto" value="{{$ficha->assunto}}" name="assunto" placeholder="Digite aqui o assunto da ficha">
			</div>
			<div class="form-group col-sm md-form">
				<label for="inputPeriodico">Periódico</label>
				<select class="form-select" id="periodico" name="periodico">
					@foreach ($periodicos as $periodico)
						@if ($ficha->periodico_id == $periodico->id)
							<option value="{{ $periodico->id }}" selected>{{ $periodico->titulo }}</option>
						@else
							<option value="{{ $periodico->id }}">{{ $periodico->titulo }}</option>
						@endif
					@endforeach
				</select>
			</div>
			<div class="form-group col-sm">
				<label for="inputPagina">Página</label>
				<input type="text" class="form-control" id="edit-pagina" value="{{$ficha->pagina}}" name="pagina" placeholder="Digite aqui a página">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="edit-data_edicao">Data da Edição</label>
				<input type="text" class="form-control datepicker" id="data_edicao" value="{{$ficha->data_edicao}}" name="data_edicao" placeholder="Digite aqui a Data da Edição" readonly='true'>
			</div>
			<div class="form-group col-sm">
				<label for="edit-edicao">Edição</label>
				<input type="text" class="form-control" id="edit-edicao" value="{{$ficha->edicao}}" name="edicao" placeholder="Digite aqui a Edição">
			</div>
			<div class="form-group col-sm">
				<label for="edit-duracao_edicao">Duração da Edição</label>
				<input type="text" class="form-control datepicker" id="duracao_edicao" value="{{$ficha->duracao_edicao}}" name="duracao_edicao" placeholder="Digite aqui a duração da Edição" readonly='true'>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="form-group col-sm">
				<label for="edit-resumo">Resumo</label>
				<textarea type="text" class="form-control" id="edit-resumo" name="resumo" placeholder="Digite aqui o Resumo">{{$ficha->resumo}}</textarea>
			</div>
			<div class="form-group col-sm">
				<label for="edit-comentario">Comentário</label>
				<textarea type="text" class="form-control" id="edit-comentario" name="comentario" placeholder="Digite aqui o Comentário">{{$ficha->comentario}}</textarea>
			</div>
		</div>
		<br>
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Atualizar Ficha</button>
		</div>
	</form>
	<br>
</div>

@endsection
