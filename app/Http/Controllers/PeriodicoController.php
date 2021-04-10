<?php

namespace App\Http\Controllers;

use App\Periodico;
use App\Issue;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\BibliowebController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use GuzzleHttp\Client;

class PeriodicoController extends BibliowebController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$periodicos = Periodico::all();
		$numeroIssues = [];
		$numeroPages = [];
		$dataInicio = [];
		$dataTermino = [];
		foreach ($periodicos as $periodico)
		{
			$issues = Issue::where('periodico_id', $periodico->id);
			$numeroIssues[$periodico->id] = $issues->count();

			$dataInicio[$periodico->id] = $issues->first() ? $issues->orderBy('data_inicio', 'asc')->first()->data_inicio->format('d/m/Y') : '-';
			$issues = Issue::where('periodico_id', $periodico->id);
			$dataTermino[$periodico->id] = $issues->first() ? $issues->orderBy('data_termino', 'desc')->first()->data_termino->format('d/m/Y') : '-';
			$numeroPages[$periodico->id] = null;
			$issues = Issue::where('periodico_id', $periodico->id)->get();

			foreach ($issues as $issue)
			{
				$numeroPages[$periodico->id] += $issue->numero_paginas;
			}

		}
		return view('conteudo.admin-periodicos')
			->with([
				'periodicos' => $periodicos,
				'numeroIssues' => $numeroIssues,
				'numeroPages' => $numeroPages,
				'dataInicio' => $dataInicio,
				'dataTermino' => $dataTermino,
				]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Periodico  $periodico
	 * @return \Illuminate\Http\Response
	 */
	public function show(Periodico $periodico)
	{
		/*
			Fazer a lógica da primeira view de um periódico aqui
			Em uma outra rota a ser atualizada via ajax:
			Listar anos disponíveis para aquele periodico
			Ao clicar em ano, listar meses disponíveis
			Ao clicar em mes, listar issues disponíveis
		*/

		//Obter aons disponíveis para o periodico

		$anos = [];

		foreach ($periodico->issues()->get() as $issue)
		{
			$ano = $issue->data_inicio->format('Y');
			if (!in_array($ano, $anos))
			{
				array_push($anos, $ano);
			}
		}

		sort($anos);

		return view('conteudo.frontend-periodico')
			->with([
				'periodico' => $periodico,
				'anos' => $anos,
				'meses' => [],
			]);
	}

	public function obterPeriodicosAno(Periodico $periodico, string $ano)
	{
		//Obter lista de meses disponíveis para um ano de um periódico

		$data = \Carbon\Carbon::createFromDate($ano,null,null);
		$inicioAno = $data->copy()->startOfYear();
		$fimAno = $data->copy()->endOfYear();
		$meses = [];

		$issuesAno = $periodico->issues()->where('data_inicio', '>=', $inicioAno)->where('data_termino', '<=', $fimAno)->get();
		
		foreach ($issuesAno as $issue)
		{
			$mesLabel = '';
			$mesInicio = $issue->data_inicio->format('m');
			$mesTermino = $issue->data_termino->format('m');
			if ($mesInicio == $mesTermino)
			{
				$mesLabel = $mesInicio;
			}
			else
			{
				$mesLabel = $mesInicio . '-' . $mesTermino;
			}
			if (!in_array($mesLabel, $meses))
			{
				array_push($meses, $mesLabel);
			}
		}

		sort($meses);

		$response = json_encode([
			'meses' => $meses,
			'ano' => $ano,
			'periodico' => $periodico->id
		]);

		return $response;
	}

	public function obterPeriodicosMes(Periodico $periodico, string $ano, string $mes)
	{
		//Obter lista de meses disponíveis para um ano de um periódico

		$data = \Carbon\Carbon::createFromDate($ano,$mes,null);
		$inicioMes = $data->copy()->startOfMonth();
		$fimMes = $data->copy()->endOfMonth();
		$dias = [];
		$response = [];

		// dd([$inicioMes, $fimMes]);


		$issuesMes = $periodico->issues()->where('data_inicio', '>=', $inicioMes)->where('data_termino', '<=', $fimMes)->get();

		if ($issuesMes->count())
		{
			foreach ($issuesMes as $issue)
			{
				$dia = $issue->data_inicio->format('d');
				if (!in_array($dia, $dias))
				{
					array_push($dias, $dia);
				}
			}
			sort($dias);

			$response = [
				'dias' => $dias,
				'mes' => $mes,
				'ano' => $ano,
				'periodico' => $periodico->id
			];
		}
		else
		{
			$issue = $periodico->issues()->where('data_inicio', '=', $inicioMes)->first();
			$dia = $issue->data_inicio->format('d');

			if (!in_array($dia, $dias))
			{
				array_push($dias, $dia);
			}
			sort($dias);

			$response = [
				'dias' => $dias,
				'mes' => $mes,
				'ano' => $ano,
				'periodico' => $periodico->id
			];
		}

		return json_encode($response);
	}

	public function obterPeriodicoIssue(Periodico $periodico, string $ano, string $mes, string $dia)
	{
		//Obter arquivos da edição

		$data = \Carbon\Carbon::createFromDate($ano,$mes,$dia)->format('Y-m-d');
		$issue = $periodico->issues()->where('data_inicio', '=', $data)->first();
		$pages = [];

		foreach ($issue->pages as $page)
		{
			$page = $page->numero;
			if (!in_array($page, $pages))
			{
				array_push($pages, $page);
			}
		}
		sort($pages);

		return json_encode([
			'pages' => $pages,
			'issue' => $issue->id,
			'periodico' => $periodico->id
		]);
	}

	public function obterPeriodicoPage(Issue $issue, string $page)
	{

		$projectId = 'web-hemeroteca-13fc0';
		$pathToKey = 'config/web-hemeroteca-13fc0-eea7d0ec6f22.json';
		$baseUri = 'https://firebasestorage.googleapis.com/v0/b/web-hemeroteca-13fc0.appspot.com/o/';

		$client = new Client([
				'base_uri' => $baseUri,
				'timeout'  => 2.0,
			 ]);

		$page = Page::where('issue_id', $issue->id)->where('numero', $page)->first();
		$filePathSuffix = str_replace('/', '%2F', $page->filepath);

		$response = $client->request('GET', $filePathSuffix);
		$downloadToken = json_decode($response->getBody()->getContents())->downloadTokens;

		$periodico = $issue->periodico()->first();
		$imgHeader = $issue->data_inicio->format('d-m-Y') . ' - ' . ' Página ' . $page->numero;

		return json_encode([
			'pagePath' => 'https://firebasestorage.googleapis.com/v0/b/web-hemeroteca-13fc0.appspot.com/o/' . $filePathSuffix . '?alt=media&token=' . $downloadToken,
			'img_header' => $imgHeader,
			'data_inicio' => $issue->data_inicio,
			'data_termino' => $issue->data_termino,
			'numero_paginas' => $issue->numero_paginas,
		]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Periodico  $periodico
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Periodico $periodico)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Periodico  $periodico
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Periodico $periodico)
	{
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Periodico  $periodico
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Periodico $periodico)
	{
		//
	}
}
