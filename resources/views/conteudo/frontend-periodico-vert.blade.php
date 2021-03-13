@extends('layouts.app')

@section('content')

<div class="container col-sm">

	<h2>{{ $periodico->titulo }}</h2>

	<div class="overflow-auto">
		<table class="table table-sm" id="grid-lista">
			<tr>
				<th class="col-2" scope="row">Ano</th>
				@foreach($anos as $ano)
					<td class="periodico-nav" id="escolher-ano-periodico" data-periodico="{{$periodico->id}}"  data-ano="{{$ano}}" style="cursor: pointer; cursor: hand;" title="Escolha o ano {{$ano}}" >{{$ano}}</td>
				@endforeach
			</tr>
		</table>	
	</div>
	<div class="overflow-auto">
		<table class="table table-sm" id="grid-lista">
			<tr class="mes-cell">
			</tr>
			<tr class="dia-cell">
			</tr>
			<tr class="page-cell">
			</tr>
		</table>	
	</div>
	<div class="overflow-auto">
		<div class="img-header">
		</div>
	</div>
	<div class="overflow-auto" id="openseadragon1" style="height: 600px;"></div>
	<br>
</div>


@endsection