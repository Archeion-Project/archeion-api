<?php

namespace App\Http\Componentes;

use App\Http\Componentes\Componentes;
use Illuminate\Support\Collection;

class GridResultados extends Componentes
{

	public $resultadosBusca;

	public function __construct(Collection $resultadosBusca)
	{
		$this->bladeView = 'componentes.gridResultados';
		$this->resultadosBusca = $resultadosBusca;
		parent::__construct();
	}

	public function view(): \Illuminate\View\View
	{
		$view = parent::view();
		$gridResultados = view($this->bladeView);

		return $view->with('gridResultados')
		->with('resultadosBusca', $this->resultadosBusca);
	}
}