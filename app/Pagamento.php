<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pagamento extends Model {

    //nome da tabela
    protected $table = 'pagamentos';
    protected $fillable = [
        'status_pagamento', 
        'forma_pagamento', 
        'valor_pago', 
        'data_vencimento',
        'pedido_id', 
        'cliente_id', 
        'valor_frete',
        'prazo_entrega',
        'codigo_boleto'
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
                        ->where('pedidos.status', 'aprovado')
                        ->where('pagamentos.status_pagamento', 'pendente')->get();
    }
    // lista os pagamentos
    public static function listarPagamento($pedido){
        return self::where('pedido_id', $pedido)->get();
    }
    // atualiza as informações de pagamento 
    public static function atualizarDataPagamento($novaData, $id) {
        $pagamento = self::find($id);
        $pagamento->data_vencimento = $novaData;
        $pagamento->push();
    }
    
    // atualiza o status do pagamento 
    public static function atualizarStatusPagamentoAprovado($id) {
        $pagamento = self::find($id);
        $pagamento->status_pagamento = "aprovado";
        $pagamento->push();
    }
    // atualiza o status do pagamento 
    public static function atualizarStatusPagamentoCacelado($id) {
        $pagamento = self::find($id);
        $pagamento->status_pagamento = "cancelado";
        $pagamento->push();
    }

    // lista as vendas que estão pagamento aprovado por cliente
    public static function listaPagamentoAprovado($usuarioId) {
        
    }
    // formata a data 
    public static function formatarData($data) {
        return date("d-m-Y", strtotime($data));
    }
    // formatar a data para salvar no banco 
    public static function formatarDataBanco($data) {
        return date("Y-m-d H:i:s", strtotime($data));
    }

}
