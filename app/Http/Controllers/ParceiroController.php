<?php

namespace App\Http\Controllers;

use App\Parceiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParceiroController extends Controller
{
    // criação da controler com as informaçoes do parceiro
    // carrega a tela de cadastro do parceiro
    public function index()
    {
        return view('cadastro.parceiro');
    }
    // metodo de cadastro
    public function cadastrar(Request $request)
    {
        // recebendo as informaçoes
        $dados = $request->all();
        // faz a validação
        $validacao = Validator::make(
            [ // campos que serão validados
                'nome' => $dados['nome'],
                'email' => $dados['email'],
                'tipo_documento' => $dados['tipo_documento'],
                'cep' => $dados['cep'],
                'logradouro' => $dados['logradouro'],
                'complemento' => $dados['complemento'],
                'bairro' => $dados['bairro'],
                'localidade' => $dados['localidade'],
                'uf' => $dados['uf'],
                'telefone' => $dados['telefone'],
                'celular' => $dados['celular'],
            ],
            [ // que tipo de informações serão validados
                'nome' => 'required|min:3|max:255',
                'email' => 'required',
                'tipo_documento' => 'required',
                'cep' => 'required',
                'logradouro' => 'required',
                'complemento' => 'required',
                'bairro' => 'required',
                'localidade' => 'required',
                'uf' => 'required',
                'telefone' => 'required|min:10|max:11',
                'celular' => 'required|min:10',
            ],
            [ // mensagens em português
                'nome.required' => 'O campo :attribute é obrigatório',
                'nome.min' => 'O campo :attribute não permite menos de 3 caracteres',
                'nome.max' => 'O campo :attribute não permite mais de 255 caracteres',
                'email.required' => 'O campo :attribute é obrigatório',
                'tipo_documento.required' => 'O campo :attribute é obrigatório',
                'cep.required' => 'O campo :attribute é obrigatório',
                'logradouro.required' => 'O campo :attribute é obrigatório',
                'complemento.required' => 'O campo :attribute é obrigatório',
                'bairro.required' => 'O campo :attribute é obrigatório',
                'localidade.required' => 'O campo :attribute é obrigatório',
                'uf.required' => 'O campo :attribute é obrigatório',
                'telefone.required' => 'O campo :attribute é obrigatório',
                'telefone.min' => 'O campo :attribute não permite menos de 10 caracteres',
                'telefone.max' => 'O campo :attribute não permite mais de 11 caracteres',
                'celular.required' => 'O campo :attribute é obrigatório',
                'celular.min' => 'O campo :attribute não permite menos de 10 caracteres',
            ]
        );

        // verifica se esta tudo certo
        if ($validacao->fails()) {
            // redireciona para a tela de cadastro
            return redirect()->action('ParceiroController@index')
                ->withErrors($validacao)
                ->withInput();
        } else {
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

            // redireciona para a tela de cadastro
            return redirect()->action('ParceiroController@index')->with('mensagem', 'Parceiro cadastrado com Sucesso !');
        }

    }
    // lista os dados do parceiro
    public function listar()
    {   // lista as informações 
        $parceiros = Parceiro::all();
        // retorna as informaçoes 
        return view('lista.parceiro_lista', compact('parceiros'));
    }
}
