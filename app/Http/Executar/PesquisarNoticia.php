<?php

namespace App\Http\Executar;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Noticia;

class PesquisarNoticia
{

	public function __construct()
	{

	}

	public function obterUltimasNoticias(int $numero)
	{
		return $this::orderBy('updated_at')->take($numero)->get();
	}

	public function view(): \Illuminate\View\View
	{

	}

}