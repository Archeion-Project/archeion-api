<?php

namespace App\Http\Executar;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Http\Componentes\BarraBusca;
use App\Http\Componentes\GridResultados;
use Illuminate\Support\Collection;

class PesquisaFicha
{
	public $termoBusca;
	public $realizaBusca;
	public $resultadosBusca;
	public $wordCount;

	public function __construct(?string $termoBusca = null)
	{
		$this->termoBusca = $termoBusca;
		$this->execute();
	}

	public function execute()
	{
		$parameters = request()->request;
		
		$this->realizaBusca = DB::table('fichas')->select('*');

		if ($this->termoBusca)
		{
			//INCLUIR JOIN PARA TITULO DE PERIODICO
			$this->resultadosBusca = $this->realizaBusca
				->orWhere('assunto', 'like', '%%' . $this->termoBusca . '%%')
				->orWhere('resumo', 'like', '%%' . $this->termoBusca . '%%')
				->orWhere('periodico_id', 'like', '%%' . $this->termoBusca . '%%')
				->orWhere('comentario', 'like', '%%' . $this->termoBusca . '%%')->get();
		}
		else
		{
			$this->resultadosBusca = new Collection();
		}
	}

	public function view(): \Illuminate\View\View
	{
		$navbar = view('blocos.navbar');
		$footer = view('componentes.footer');
		$barraBusca = new BarraBusca($this->termoBusca);
		$gridResultados = new GridResultados($this->resultadosBusca);

		return view('home')
			->with('navbar', $navbar)
			->with('footer', $footer)
			->with('barraBusca', $barraBusca->view())
			->with('gridResultados', $gridResultados->view())
			->with('termoBusca', $this->termoBusca)
			->with('resultadosBusca', $this->resultadosBusca)
			->with('wordCount', $this->resultadosBusca->count());
	}
}
