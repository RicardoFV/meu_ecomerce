<?php

namespace App\Http\Controllers;

use App\Parceiro;
use App\Http\Requests\ParceiroFormRequest;

class ParceiroController extends Controller {
    
    private $parceiro;

    public function __construct() {
        $this->parceiro = new Parceiro();
    }
    // criação da controler com as informaçoes do parceiro
    // carrega a tela de cadastro do parceiro
    public function index() {
        return view('cadastro.parceiro');
    }

    // metodo de cadastro
    public function cadastrar(ParceiroFormRequest $request) {
        // recebendo as informaçoes
        $dadosForm = $request->all();
        // instanciando o objeto
        $inserir = Parceiro::create($dadosForm);
        //faz a verificação se foi inserido corretamente
        if ($inserir) {
            // redireciona para a tela de cadastro
            return redirect()->action('ParceiroController@listar')->with('mensagem', 'Parceiro cadastrado com Sucesso !');
        } else {
            return redirect()->action('ParceiroController@index')
                            ->withErrors($dadosForm)
                            ->withInput();
        }
    }

    // função que faz a consulta no banco
    public function consultar($id) {
        // consulta o parceiro
        $parceiro = Parceiro::find($id);
        // faz a verificação
        if (empty($parceiro)) {
            return 'Parceiro não existe';
        } else {
            // retorna o parceiro para a tela de edição
            return view('altera.parceiro_altera', [
                'parceiro' => $parceiro,
            ]);
        }
    }

    // metodo que faz a atualização
    protected function atualizar(ParceiroFormRequest $request, $id) {
        /// recebe as informações 
        $dadosForm = $request->all();
        // faz a busca por id
        $this->parceiro = $this->parceiro->find($id);
        //faz a atualização
        $atualizar = $this->parceiro->update($dadosForm);
        //faz a verificação se foi atualizado corretamente
        if ($atualizar) {
            // redireciona para a tela de cadastro
            return redirect()->action('ParceiroController@listar')->with('mensagem', 'Parceiro Alterado com Sucesso !');
        } else {
            // se deu errado , volta a tela de cadastro
            return redirect()->action('ParceiroController@index')
                            ->withErrors($dadosForm);
        }
    }

    public function deletar($id) {
        // consulta o parceiro
        $parceiro = Parceiro::find($id);
        // deleta o parceiro 
        $parceiro->delete();
        // redireciona para a tela de cadastro
        return redirect()->action('ParceiroController@listar')
                ->with('mensagem', 'Parceiro Deletado com Sucesso !');
    }

    // lista os dados do parceiro
    public function listar() { // lista as informações
        $parceiros = Parceiro::all();
        // retorna as informaçoes
        return view('lista.parceiro_lista', compact('parceiros'));
    }

}
