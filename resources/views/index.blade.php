@extends('layouts.app')

@section('content')

	<div class="container">
		
		@isset($titulo)
			{!! $titulo !!}
		@endisset

		@isset($barraBusca)
			{!! $barraBusca !!}
		@endisset

		@isset($carousel)
			{!! $carousel !!}
		@endisset

		@isset($conteudo)
			{!! $conteudo !!}
		@endisset

	</div>


@endsection