<?php

namespace App\Http\Controllers;

use App\Parceiro;
use Illuminate\Http\Request;

class ParceiroController extends Controller
{
    // criação da controler com as informaçoes do parceiro

    public function index()
    {
        return view('cadastro.parceiro');
    }

    public function cadastrar(Request $request)
    {   
        // recebendo as informaçoes 
        $dados = $request->all();

        // instanciando o objeto
        $parceiro = new Parceiro(); 
        // passando para o objeto
        $parceiro->nome = $dados['nome'];
        $parceiro->email = $dados['email'];
        $parceiro->tipo = $dados['tipo'];
        $parceiro->tipo_documento = $dados['tipo_documento'];
        $parceiro->cep = $dados['cep'];
        $parceiro->logradouro = $dados['logradouro'];
        $parceiro->complemento = $dados['complemento'];
        $parceiro->bairro = $dados['bairro'];
        $parceiro->localidade = $dados['localidade'];
        $parceiro->uf = $dados['uf'];
        $parceiro->telefone = $dados['telefone'];
        $parceiro->celular = $dados['celular'];

        // salva no banco 
        $parceiro->save();
        
    }
}
