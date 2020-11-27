<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
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
		$noticias = Noticia::orderBy('updated_at', 'desc')->get();
		return view('conteudo.dashboard-noticias')
			->with(['noticias' => $noticias]);
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
		$noticia->save();
		//Lógica para imagens
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
	public function update(Request $request, Noticia $noticia)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Noticia  $noticia
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Noticia $noticia)
	{
		//
	}
}
