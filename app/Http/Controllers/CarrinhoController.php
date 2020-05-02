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
            // faz o cadastro 
            Pedido::cadastrarPedido($sessionId);
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
            // passa os valores para a variavel
            $dados = [
                'quantidade' => $qde_desejada,
                'valor' => $valorConpraProduto,
                'pedido_id' => $pedidoId,
                'produto_id' => $produto_id,
            ];
            //cadastra o novo pedidoitem
            PedidoItem::cadastraPedidoItem($dados);
            // atualiza a quantidade 
            Produto::atualizarProduto($produto_id, $qde_desejada);
        } else { // se o pedidoItem e o produto for o mesmo, então atualiza 
            // consulta o pedido item 
            $item = PedidoItem::find($pedidoItem->id);
            // passa a quantidade que esta no banco 
            $qde_registrada = $item->quantidade;
            if ($qde_desejada < $qde_registrada) {
                // faz a subtracao 
                $qtde_sobra = $qde_registrada - $qde_desejada;
                // corrigi o estoque 
                Produto::voltarProEstoque($produto_id, $qtde_sobra);
                //atuazlia o pedidoItem
                PedidoItem::atualizaItemPedito($pedidoItem->id, $qde_desejada, $valorConpraProduto);
            } else if ($qde_desejada > $qde_registrada) {
                // faz a subtracao 
                $qtde_sobra = $qde_registrada - $qde_desejada;
                // corrigi o estoque 
                Produto::retirarValorEstoque($produto_id, $qtde_sobra);
                //atuazlia o pedidoItem
                PedidoItem::atualizaItemPedito($pedidoItem->id, $qde_desejada, $valorConpraProduto);
            }
        }
        return view('venda.carrinho');
    }

}