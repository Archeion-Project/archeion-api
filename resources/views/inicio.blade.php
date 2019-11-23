@extends('layouts.app')

	{!! $navbar !!}

<div class="container">
	
	{!! $conteudo !!}

	@isset($barraBusca)
		{!! $barraBusca !!}
	@endisset

</div>