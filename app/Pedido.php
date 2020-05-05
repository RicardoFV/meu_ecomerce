<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

    //os campos da tabela
    protected $fillable = [
        'session_id',
        'status',
    ];

    // salvar um novo pedido 
    public static function cadastrarPedido($sessionId) {
        Self::create([// insere os novos dados 
            'session_id' => $sessionId,
            'status' => 'pendente'
        ]);
    }
    // deleta o pedido
    public static function deletarPedido(Pedido $pedido) {
        $pedido->delete();
    }
   
    // verificar se existe ou não a session
    public static function consultarPedidoPorSessio($sessionId) {
        // faz a busca 
        $pedido = self::where('session_id', $sessionId)->first('id');
        return !empty($pedido->id) ? $pedido->id : null;
    }

}
