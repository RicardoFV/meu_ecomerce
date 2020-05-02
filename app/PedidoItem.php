<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    public static function atualizaItemPedito($idItem, $qde_desejada, $valorConpraProduto) {
        self::find($idItem)->update(array('quantidade' => $qde_desejada, 'valor' => $valorConpraProduto));
    }

}
