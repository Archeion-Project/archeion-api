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
		return Noticia::latest('noticias')->limit($numero);
	}

	public function view(): \Illuminate\View\View
	{

	}

}