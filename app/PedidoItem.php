<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class PedidoItem extends Model {

    //colocando o nome da tabela
    protected $table = 'pedido_itens';
    // os campos da tabela 
    protected $fillable = [
        'quantidade',
        'valor',
        'pedido_id',
        'produto_id'
    ];

    // cadastrar pedido item 
    public static function cadastraPedidoItem(array $dados) {
        self::create($dados);
    }

    // atualiza pedido 
    public static function atualizaItemPedido($idItem, $qde_desejada, $valorConpraProduto) {
        self::find($idItem)->update(array('quantidade' => $qde_desejada, 'valor' => $valorConpraProduto));
    }
    //deleta o item 
    public static function deletarPedidoItem(PedidoItem $pedidoItem) {
        $pedidoItem->delete();
    }
    
    
    // lista todos os pedidosItens
    public static function listarPedidoItem() {
        return DB::table('pedido_itens')
                        ->join('produtos', 'pedido_itens.produto_id', '=', 'produtos.id')
                        ->select('pedido_itens.*',
                                'produtos.nome as produtoNome',
                                'produtos.imagem',
                                'produtos.quantidade as produtoQuantidade')->get();
    }

}
