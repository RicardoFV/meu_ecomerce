<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model {

    //os campos da tabela
    protected $fillable = [
        'session_id',
        'status',
    ];
    // verificar se existe ou não a session
    public static function consultarPedito($sessionId) {
        // faz a busca 
        $pedido = self::where('session_id', $sessionId)->first('id');
        return !empty($pedido->id) ? $pedido->id : null;
    }
}
