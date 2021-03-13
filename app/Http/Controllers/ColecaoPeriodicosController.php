<?php

namespace App\Http\Controllers;

use App\Periodico;
use Illuminate\Http\Request;

class ColecaoPeriodicosController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$mensagem = request()->mensagem ?? '';
		$periodicos = Periodico::all();
		$fichas = Ficha::orderBy('updated_at', 'desc')->get();
		return view('conteudo.admin-fichas')
			->with(['fichas' => $fichas])
			->with(['periodicos' => $periodicos])
			->with(['mensagem' => $mensagem]);
	}
}
