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

		// // The file
		// $filename = $request->imagem;

		// // Set a maximum height and width
		// $width = 400;
		// $height = 300;

		// // Get new dimensions
		// list($width_orig, $height_orig) = getimagesize($filename);

		// $ratio_orig = $width_orig/$height_orig;

		// if ($width/$height > $ratio_orig)
		// {
		// 	$width = $height*$ratio_orig;
		// }
		// else
		// {
		// 	$height = $width/$ratio_orig;
		// }

		// // Resample
		// $image_p = imagecreatetruecolor($width, $height);
		// $image = imagecreatefromjpeg($filename);
		// imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width_orig, $height_orig);
		// $filePath = public_path() . '/img/' . $request->imagem->hashName();
		// $dbPath = 'img/' . $request->imagem->hashName();
		// imagejpeg($image_p, $filePath, 100);

		// $noticia->filepath = $dbPath;
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
	public function update(Request $request, Noticia $noticia)
	{
		$noticia->titulo = $request->titulo;
		$noticia->subtitulo = $request->subtitulo;
		$noticia->texto = $request->texto;
		$noticia->save();
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
