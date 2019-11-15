<?php

namespace App\Http\Executar;

use Illuminate\Support\Facades\DB;

class PesquisaFicha
{
	public $termoBusca;
	public $realizaBusca;
	public $resultadosBusca;
	public $wordCount;

	public function __construct(string $termoBusca)
	{
		$this->termoBusca = $termoBusca;
		$this->execute();
	}

	public function execute()
	{
		$parameters = request()->request;
		$this->realizaBusca = DB::table('fichas')->select('*');
		$filtro = $parameters->get('filtro');

		if($filtro == 'assunto')
		{
			// dd('ass');
			$this->resultadosBusca = $this->realizaBusca->orWhere('assunto', 'like', '%%' . $this->termoBusca . '%%')->get();
		}
		if($filtro == 'resumo')
		{
			// dd('res');
			$this->resultadosBusca = $this->realizaBusca->orWhere('resumo', 'like', '%%' . $this->termoBusca . '%%')->get();
		}
		if($filtro == 'periodico')
		{
			// dd('per');
			$this->resultadosBusca = $this->realizaBusca->orWhere('periodico', 'like', '%%' . $this->termoBusca . '%%')->get();
		}
		if($filtro == 'comentario')
		{
			// dd('com');
			$this->resultadosBusca = $this->realizaBusca->orWhere('comentarios', 'like', '%%' . $this->termoBusca . '%%')->get();
		}
	}

	public function view(): \Illuminate\View\View
	{
		return $view = view('home')
		->with('resultadosBusca', $this->resultadosBusca)
		->with('wordCount', $this->resultadosBusca->count());
	}
}
