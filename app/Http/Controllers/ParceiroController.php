<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ParceiroController extends Controller
{
    // criação da controler com as informaçoes do parceiro

    public function index()
    {
        return view('cadastro.parceiro');
    }
}
