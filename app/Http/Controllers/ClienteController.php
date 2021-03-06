<?php

namespace App\Http\Controllers;

use App\PedidoItem;
use App\Cliente;
use App\Http\Requests\ClienteFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Validacoes;

class ClienteController extends Controller {

    private $cliente;

    public function __construct() {
        $this->cliente = new Cliente();
    }

    public function index() {
        return view('cadastro.cliente');
    }

    //cadastrar o cliente
    public function cadastrar(ClienteFormRequest $request) {
        // recebe as informações
        $dadosForm = $request->all();
        // faz a ação de inserir
        $inserir = Cliente::create($dadosForm);
        //faz o teste 
        if ($inserir) {

            // pega os elementos        
            $cliente = Cliente::where('usuario_id', auth()->user()->id)->first();
            if (isset($cliente)) {
                // faz a busca dos itens
                $itens = PedidoItem::listarItensPorCliente($cliente['id']);
                if (sizeof($itens) == 0) {
                    return redirect()->route('home');
                } else {
                    //print_r($itens); exit();
                    // retorna pra view
                    return view('venda.finalizar_venda', [
                        'itens' => $itens
                    ]);
                }
            } else {
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->withErrors($dadosForm)->withInput();
        }
    }

    // função que faz a consulta no banco
    public function consultar($id) {
        $cliente = Cliente::find($id);
        // verifica se existe os dados
        if (empty($cliente)) {
            return view('altera.cliente_altera');
        } else {
            return view('altera.cliente_altera', compact('cliente'));
        }
    }

    public function consultarCpf(Request $request) {
        $cpf = $request->post('meu_cpf');
        $cliente = Cliente::consultarCpf($cpf);
        // verifica se existe os dados
        if (empty($cliente)) {
            return redirect()->route('cliente.tela_atualizar')->with('erro', 'Cliente não cadastrado na base dados!');
        } else {
            return view('altera.cliente_altera', compact('cliente'));
        }
    }

    // clica para entrar na tela de alterar o cliente
    public function telaAtualizar() {
        return view('altera.cliente_altera');
    }

    // metodo que faz a atualização
    protected function atualizar(ClienteFormRequest $request, $id) {
        // recebe as informações
        $dadosForm = $request->all();
        $this->cliente = $this->cliente->find($id);
        if ($this->cliente) {
            /* valida o cpf
            if (!Validacoes::validaCPF($dadosForm['cpf'])) {
                return redirect()->back()->withInput()
                                ->with('erro', 'É necessário informar um CPF valido');
            }
             * 
             */
            // se tudo ok valida 
            $atualizar = $this->cliente->update($dadosForm);
            if ($atualizar) {
                if (Gate::allows('adm', Auth::user())) {
                    return redirect()->route('cliente.listar')
                                    ->with('mensagem', 'Cliente Alterado com Sucesso !');
                } else {
                    return redirect()->route('cliente.tela_atualizar')
                                    ->with('mensagem', 'Cliente Alterado com Sucesso !');
                }
            } else {
                return redirect()->back()->withErrors($dadosForm);
            }
        }
    }

    // no deletar vamos usar uma exclusão logica 
    public function deletar($id) {
        $cliente = Cliente::find($id);
        //verifica se existe o cliente
        if (empty($cliente)) {
            return 'Cliente não existe';
        } else {
            $cliente->ativo = 0;
            // passa as informaçoes
            $excluir = $cliente->push();
            // se excluir for verdadeiro
            if ($excluir) {
                return redirect()->route('cliente.listar')
                                ->with('mensagem', 'Cliente desativado com Sucesso !');
            } else {
                return redirect()->back()->with('erro', 'Cliente não pode ser removido !');
            }
        }
    }

    // metodo que lista todos os clientes
    public function listar() {
        $clientes = Cliente::where('ativo', 1)->get();
        return view('lista.cliente_lista')->with('clientes', $clientes);
    }

}
