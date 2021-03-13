<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NoticiaController extends BibliowebController
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
		$noticias = Noticia::orderBy('updated_at', 'desc')->get();
		return view('conteudo.admin-noticias-dashboard')
			->with(['noticias' => $noticias])
			->with(['confirmaSalvar' => $confirmaSalvar]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Noticia $noticia)
	{
		$noticia->titulo = $request->titulo;
		$noticia->subtitulo = $request->subtitulo;
		$noticia->texto = $request->texto;
		$noticia->status = $request->status;
		$noticia->filepath = $request->filepath;

		$confirmaSalvar = $noticia->save();

		if ($confirmaSalvar)
		{
			$confirmaSalvar = 'true';
		}
		else
		{
			$confirmaSalvar = 'none';
		}
		return redirect()->route('noticia.create', ['confirmarSalvar' => $confirmaSalvar]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Noticia  $noticia
	 * @return \Illuminate\Http\Response
	 */
	public function show(Noticia $noticia)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Noticia  $noticia
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Noticia $noticia)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Noticia  $noticia
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Noticia $noticium)
	{
		$noticium->titulo = $request->titulo;
		$noticium->subtitulo = $request->subtitulo;
		$noticium->status = $request->status;
		$noticium->texto = $request->texto;
		$noticium->save();

		return redirect()->route('noticia.create');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Noticia  $noticia
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Noticia $noticia)
	{
		$mensagem = $noticia->delete() ? 'destroy' : 'destroy-error';
		return redirect()->route('noticia.create', ['mensagem' => $mensagem]);
		//
	}
}
