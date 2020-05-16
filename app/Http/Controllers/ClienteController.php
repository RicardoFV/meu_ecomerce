<?php

namespace App\Http\Controllers;

use App\PedidoItem;
use App\Cliente;
use App\Pedido;
use App\Http\Requests\ClienteFormRequest;

class ClienteController extends Controller {

    //cadastrar o cliente
    public function cadastrar(ClienteFormRequest $request) {
        // recebe as informações
        $dadosForm = $request->all();
        // faz a ação de inserir
        $inserir = Cliente::create($dadosForm);
        //faz o teste 
        if ($inserir) {
            // recebe a session
            $sessionId = session()->getId();
            // faz a consulta , para ver se existe essa session
            $pedidoOId = Pedido::consultarPedidoPorSessio($sessionId);
            // pega os elementos        
            $cliente = Cliente::where('usuario_id', auth()->user()->id)->first();
            $itens = PedidoItem::listarPedidoItem($pedidoOId);
            // retorna pra view
            return view('venda.finalizar_venda', [
                'itens' => $itens,
                'cliente' => $cliente,
            ]);
        } else {
            return redirect()->back()->withErrors($dadosForm)->withInput();
        }
    }

}
