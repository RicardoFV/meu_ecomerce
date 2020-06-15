<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

    //os campos da tabela
    protected $fillable = [
        'session_id',
        'status',
        'cliente_id'
    ];

    // salvar um novo pedido 
    public static function cadastrarPedido($sessionId, $clienteId) {
        Self::create([// insere os novos dados 
            'session_id' => $sessionId,
            'status' => 'pendente',
            'cliente_id' => $clienteId
        ]);
    }
    //faz a atuazlização da sessao 
    public static function atualizarSessao($pedido_id , $sessao_id ) {
        $pedido = self::find($pedido_id);
        $pedido->session_id = $sessao_id;
        $pedido->push();       
    }
     //faz a atuazlização da sessao 
    public static function atualizarPedido($id , $status ) {
        $pedido = self::find($id);
        $pedido->status = $status;
        $pedido->push();       
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
