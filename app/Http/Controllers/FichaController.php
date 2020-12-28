<?php

namespace App\Http\Controllers;

use App\Ficha;
use App\Periodico;
use Illuminate\Http\Request;

class FichaController extends Controller
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
		$confirmaSalvar = request()->confirmarSalvar ?? 'none';
		$periodicos = Periodico::all();
		$fichas = Ficha::orderBy('updated_at', 'desc')->get();
		return view('conteudo.admin-fichas')
			->with(['fichas' => $fichas])
			->with(['periodicos' => $periodicos])
			->with(['confirmaSalvar' => $confirmaSalvar]);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Ficha $ficha)
	{
		$ficha->assunto = $request->assunto;
		$ficha->periodico = $request->periodico;
		$ficha->data_edicao = $request->data_edicao;
		$ficha->duracao_edicao = $request->duracao_edicao;
		$ficha->pagina = $request->pagina;
		$ficha->resumo = $request->resumo;
		$ficha->comentario = $request->comentario;
		$ficha->edicao = $request->edicao;
		$confirmaSalvar = $ficha->save();

		if ($confirmaSalvar)
		{
			$confirmaSalvar = 'true';
		}
		else
		{
			$confirmaSalvar = 'none';
		}

		return redirect()->route('ficha.create', ['confirmarSalvar' => $confirmaSalvar]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Ficha  $ficha
	 * @return \Illuminate\Http\Response
	 */
	public function show(Ficha $ficha)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Ficha  $ficha
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Ficha $ficha)
	{
		//
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
		$ficha->periodico = $request->periodico;
		$ficha->data_edicao = $request->data_edicao;
		$ficha->duracao_edicao = $request->duracao_edicao;
		$ficha->pagina = $request->pagina;
		$ficha->resumo = $request->resumo;
		$ficha->comentario = $request->comentario;
		$ficha->edicao = $request->edicao;
		$confirmaSalvar = $ficha->save();

		if ($confirmaSalvar)
		{
			$confirmaSalvar = 'true';
		}
		else
		{
			$confirmaSalvar = 'none';
		}

		return redirect()->route('ficha.create', ['confirmarSalvar' => $confirmaSalvar]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Ficha  $ficha
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Ficha $ficha)
	{
		//
	}
}
