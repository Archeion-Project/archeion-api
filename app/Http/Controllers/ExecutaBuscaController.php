<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Executar\PesquisaFicha;

class ExecutaBuscaController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	public function index()
	{
		return view('inicio');
	}
	
	public function buscar()
	{
		$pesquisaFicha = new PesquisaFicha(request()->termoBusca);
		return $pesquisaFicha->view();
	}
}