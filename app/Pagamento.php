<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    // lista as vendas que estão aguardando pagamento por cliente
    public static function listarAguardandoPagamento($usuarioId) {
        return DB::table('pagamentos')
                        ->join('clientes', 'pagamentos.cliente_id', '=', 'clientes.id')
                        ->join('pedidos', 'pagamentos.pedido_id', '=', 'pedidos.id')
                        ->select('pagamentos.*',
                                'clientes.id as cliente_id', 'clientes.nome as nomeCliente', 'clientes.usuario_id',
                                'pedidos.status as statusPedido')
                        ->where('clientes.usuario_id', $usuarioId)
                        ->where('pedidos.status', 'aprovado')->get();
    }

    // lista as vendas que estão pagamento aprovado por cliente
    public static function listaPagamentoAprovado($usuarioId) {
        
    }

}
