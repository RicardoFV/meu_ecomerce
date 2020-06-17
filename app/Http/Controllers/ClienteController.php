<?php

namespace App\Http\Controllers;

use App\PedidoItem;
use App\Cliente;
use App\Http\Requests\ClienteFormRequest;

class ClienteController extends Controller {

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

}
