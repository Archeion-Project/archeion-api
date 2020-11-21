@extends('layouts.app')

	{!! $navbar !!}

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
