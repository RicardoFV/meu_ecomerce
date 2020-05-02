<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pedido;
use App\PedidoItem;
use App\Produto;

class CarrinhoController extends Controller {

    //controller responsavel por montar o carrinho
    public function cadastrar(Request $request) {
        // pega a session do navegador 
        $sessionId = session()->getId();
        $this->middleware('VerifyCsrfToken');
        // passa os valores para as variaveis 
        $produto_id = $request->input('produto_id');
        $qde_desejada = $request->input('quantidade');

        // faz a busca do produto pelo o id
        $produto = Produto::find($produto_id);
        // calcuala o valor do produto 
        $valorConpraProduto = $produto->preco * $qde_desejada;

        //verfiica se o produto não esta vazio
        if (empty($produto)) {
            // manda uma mensagem de erro
        }
        // faz a consulta do pedido pelo id da session
        $pedidoId = Pedido::consultarPedito($sessionId);
        //se o pedidoId viee vazio, significa que o pedido não existe, então insere
        if (empty($pedidoId)) {
            Pedido::create([// insere os novos dados 
                'session_id' => $sessionId,
                'status' => 'pendente'
            ]);
            // faz a consulta do pedido pelo id da session
            $pedidoId = Pedido::consultarPedito($sessionId);
        }
        // verifica se o pedidoItem ja esta cadastrado
        $pedidoItem = PedidoItem::where([
                    'produto_id' => $produto_id,
                    'pedido_id' => $pedidoId,
                ])->first(['id', 'quantidade']);
        // caso se vier vazio , adiciona
        if (empty($pedidoItem)) {
            PedidoItem::create([
                'quantidade' => $qde_desejada,
                'valor' => $valorConpraProduto,
                'pedido_id' => $pedidoId,
                'produto_id' => $produto_id,
            ]);
            // atualiza a quantidade 
            Produto::atualizarProduto($produto_id, $qde_desejada);
        } else { // se o pedidoItem e o produto for o mesmo, então atualiza 
            // consulta o pedido item 
            PedidoItem::find($pedidoItem->id)->update(
                    array('quantidade' => $qde_desejada,
                        'valor' => $valorConpraProduto,
            ));
        }
        return view('venda.carrinho');
    }

}
