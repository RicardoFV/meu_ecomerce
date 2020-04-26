<?php

namespace App\Http\Controllers;

use App\Parceiro;
use App\Http\Requests\ParceiroFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ParceiroController extends Controller {

    private $parceiro;

    public function __construct() {
        $this->middleware('auth');
        $this->parceiro = new Parceiro();
    }

    // criação da controler com as informaçoes do parceiro
    // carrega a tela de cadastro do parceiro
    public function index() {
        if (Gate::allows('adm', Auth::user())) {
            return view('cadastro.parceiro');
        } else {
            abort(403, 'Não autorizado');
        }
    }

    // metodo de cadastro
    public function cadastrar(ParceiroFormRequest $request) {
        if (Gate::allows('adm', Auth::user())) {
            // recebendo as informaçoes
            $dadosForm = $request->all();
            // instanciando o objeto
            $inserir = Parceiro::create($dadosForm);
            //faz a verificação se foi inserido corretamente
            if ($inserir) {
                // redireciona para a tela de cadastro
                return redirect()->action('ParceiroController@listar')->with('mensagem', 'Parceiro cadastrado com Sucesso !');
            } else {
                // retorna para a mesma tela
                return redirect()->back()->withErrors($dadosForm)->withInput();
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    // função que faz a consulta no banco
    public function consultar($id) {
        if (Gate::allows('adm', Auth::user())) {
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
        } else {
            abort(403, 'Não autorizado');
        }
    }

    // metodo que faz a atualização
    protected function atualizar(ParceiroFormRequest $request, $id) {
        if (Gate::allows('adm', Auth::user())) {
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
                return redirect()->back()->withErrors($dadosForm);
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    // no deletar vamos usar uma exclusão logica 
    public function deletar($id) {
        if (Gate::allows('adm', Auth::user())) {
            // consulta o parceiro
            $parceiro = Parceiro::find($id);
            // altera o campo ativo para 0
            $parceiro->ativo = 0;
            // excluir recebe a atividade de excluir
            $excluir = $parceiro->push();
            // verifica se deu certo
            if ($excluir) {
                // redireciona para a tela de cadastro
                return redirect()->action('ParceiroController@listar')
                                ->with('mensagem', 'Parceiro desativado com Sucesso !');
            } else {
                // redireciona para a tela de cadastro
                return redirect()->back()->with('erro', 'Parceiro não pode ser removido !');
            }
        }else {
            abort(403, 'Não autorizado');
        }
    }

    // lista os dados do parceiro
    public function listar() { // lista as informações , todos os ativos
        if (Gate::allows('adm', Auth::user())) {
            $parceiros = Parceiro::where('ativo', 1)->get();
            // retorna as informaçoes
            return view('lista.parceiro_lista', compact('parceiros'));
        } else {
            abort(403, 'Não autorizado');
        }
    }

}
