<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    // criação da controler com as informaçoes do produto

    public function index()
    {
        return view('cadastro.produto');
    }
}
