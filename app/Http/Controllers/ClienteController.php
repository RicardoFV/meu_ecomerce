<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PedidoItem;
use App\Cliente;
use App\Produto;

class ClienteController extends Controller {

    //cadastrar o cliente
    public function cadastrar(Request $request) {
        // recebe as informações
        $dadosForm = $request->all();
        // faz a ação de inserir
        $inserir = Cliente::create($dadosForm);
        //faz o teste 
        if ($inserir) {
            // pega o elemento 
            $pedido = $dadosForm['pedido_id'];
            $cliente = Cliente::where('usuario_id', auth()->user()->id)->first();
            $itens = PedidoItem::consultarPedidoItem($pedido);
            // faz um foreach para percorrer os elementos
            foreach ($itens as $item ){
                $produto = Produto::consultarProduto($item->produto_id);
            }
                
            // retorna pra view
            return view('venda.finalizar_venda', [
                'itens' => $itens,
                'cliente' => $cliente,
                'produto' => $produto
            ]);
        } else {
            return redirect()->back();
        }
    }

}
