@extends('layouts.app')

	{!! $navbar !!}

<div class="container">
	
	{!! $conteudo !!}

	@isset($barraBusca)
		{!! $barraBusca !!}
	@endisset

	@isset($carousel)
		{!! $carousel !!}
	@endisset

</div>

<div class="footer">

	{!! $footer !!}

</div>
