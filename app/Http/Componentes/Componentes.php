<?php

namespace App\Http\Componentes;

class Componentes
{

	public $bladeView;

	public function __construct()
	{
		$this->view();
	}

	public function view(): \Illuminate\View\View
	{
		return view($this->bladeView);
	}

}