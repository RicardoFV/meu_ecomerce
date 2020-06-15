<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model {

    //nome da tabela
    protected $table = 'pagamentos';
    protected $fillable = [
        'status_pagamento', 'forma_pagamento', 'valor_pago', 'data_vencimento',
        'pedido_id', 'cliente_id'
    ];
    
    public static function cadastrarPagamento(array $pagamento) {
        self::create($pagamento);
    }
}
