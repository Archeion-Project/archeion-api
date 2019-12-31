@extends('layouts.app')

@if(Auth::user())

	{!! $navbar !!}

@endif

<div class="container">
	
	{!! $conteudo !!}

	@isset($carousel)
		{!! $carousel !!}
	@endisset

	@isset($barraBusca)
		{!! $barraBusca !!}
	@endisset

</div>

<div class="footer">

	{!! $footer !!}

</div>
