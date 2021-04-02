<?php

namespace App\Http\Controllers;

use App\Ficha;
use App\Periodico;
use Illuminate\Http\Request;
use App\Http\Controllers\BibliowebController;

class FichaController extends BibliowebController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$mensagem = request()->mensagem ?? '';
		$periodicos = Periodico::all();
		$fichas = Ficha::orderBy('updated_at', 'desc')->get();
		return view('conteudo.admin-fichas-dashboard')
			->with(['fichas' => $fichas])
			->with(['periodicos' => $periodicos])
			->with(['mensagem' => $mensagem]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		$ficha = new Ficha;
		$ficha->assunto = $request->assunto;
		$ficha->periodico_id = $request->periodico;
		$ficha->data_edicao = \Carbon\Carbon::parse($request->data_edicao);
		$ficha->duracao_edicao = \Carbon\Carbon::parse($request->duracao_edicao);
		$ficha->pagina = $request->pagina;
		$ficha->resumo = $request->resumo;
		$ficha->comentario = $request->comentario;
		$ficha->edicao = $request->edicao;
		$mensagem = null;
		$mensagem = $ficha->save() ? 'store' : 'store-error';

		return redirect()->route('ficha.create', ['mensagem' => $mensagem]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Ficha  $ficha
	 * @return \Illuminate\Http\Response
	 */
	public function show(Ficha $ficha)
	{
		$periodicos = Periodico::all();

		return view('conteudo.admin-ficha-delete')
			->with(['periodicos' => $periodicos])
			->with(['ficha' => $ficha]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Ficha  $ficha
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Ficha $ficha)
	{
		$periodicos = Periodico::all();

		return view('conteudo.admin-ficha-edit')
			->with(['periodicos' => $periodicos])
			->with(['ficha' => $ficha]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Ficha  $ficha
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Ficha $ficha)
	{
		$ficha->assunto = $request->assunto;
		$ficha->periodico_id = $request->periodico;
		$ficha->data_edicao = \Carbon\Carbon::parse($request->data_edicao);
		$ficha->duracao_edicao = \Carbon\Carbon::parse($request->duracao_edicao);
		$ficha->pagina = $request->pagina;
		$ficha->resumo = $request->resumo;
		$ficha->comentario = $request->comentario;
		$ficha->edicao = $request->edicao;
		$ficha->save();

		return redirect()->route('ficha.create');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Ficha  $ficha
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, Ficha $ficha)
	{
		$mensagem = $ficha->delete() ? 'destroy' : 'destroy-error';
		return redirect()->route('ficha.create', ['mensagem' => $mensagem]);
		//
	}
}
