<?php

namespace App\Http\Controllers;

use App\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BibliowebController extends Controller
{

    public function index()
    {
        return view('conteudo.admin-dashboard');
    }

}
