<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PedidoItem;
use App\Cliente;

class ClienteController extends Controller {

    //cadastrar o cliente
    public function cadastrar(Request $request) {
        // recebe as informações
        $dadosForm = $request->all();
        // faz a ação de inserir
        $inserir = Cliente::create($dadosForm);
        //faz o teste 
        if ($inserir) {
            // pega os elementos        
            $cliente = Cliente::where('usuario_id', auth()->user()->id)->first();
            $itens = PedidoItem::listarPedidoItem();
            // retorna pra view
            return view('venda.finalizar_venda', [
                'itens' => $itens,
                'cliente' => $cliente,
            ]);
        } else {
            return redirect()->back();
        }
    }

}
