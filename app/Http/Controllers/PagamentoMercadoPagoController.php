<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago;
use App\PedidoItem;
use App\Pedido;
use App\Pagamento;

class PagamentoMercadoPagoController extends Controller {

    // homologaçao / teste 
    private $sand_key_hom = 'TEST-9158a998-d3e6-4374-abb4-7d9484d656c8';
    private $sand_token_hom = 'TEST-5310965525503370-051823-2699a1d4c2e8138abcd476b39c70f433-570231747';
    // produção
    private $sand_key_prod = 'APP_USR-5ba23260-6b26-4d76-9353-00a8b5b61230';
    private $sand_token_prod = 'APP_USR-4667265261301949-060120-c4a9c447639676c6a778df8ba8c4fe41-199421913';

    function __construct() {
        $this->middleware('auth');
    }

    //pagamento via boleto 
    public function gerarBoleto(Request $request) {
        //clienteId
        $idCliente = null;
        // pedsdioId
        $pedidoId = null;
        // se tiver clienteId
        if ($request->post('idcliente')) {
            //recebe o id do cliente 
            $idCliente = $request->post('idcliente');
            //consulta o pedido pelo idcliente
            $itens = PedidoItem::listarItensPorCliente($idCliente);
        }
        // se tiver pedidoId
        if ($request->post('pedidoId')) {
            // recebe o id do pedido
            $pedidoId = $request->post('pedidoId');
            //consulta o pedido pelo idcliente
            $itens = PedidoItem::listarItensPorPedidoId($pedidoId);
            // lista os pagamentos 
            $dados = Pagamento::listarPagamento($pedidoId);
        }
        // cria as variaveis que serão colocados no boleto     
        $valor_final = null;
        $nome_produto = '';
        $cliente = null;
        $status = '';
        $pedido_id = null;
        // carrega as informações 
        foreach ($itens as $iten) {

            $valor_final += $iten->valor;
            $nome_produto .= $iten->produtoNome . ' | ';
            $status = $iten->status;
            $pedido_id = $iten->id;
            // caso já tenha dados , não ira preencher
            if (empty($cliente)) {
                $cliente = [
                    'idCliente' => $iten->cliente_id,
                    'nomeCliente' => $iten->nomeCliente,
                    'emailCliente' => $iten->email,
                    'cpf' => $iten->cpf,
                    'cep' => $iten->cep,
                    'logradouro' => $iten->logradouro,
                    'complemento' => $iten->complemento,
                    'bairro' => $iten->bairro,
                    'localidade' => $iten->localidade,
                    'uf' => $iten->uf
                ];
            }
        }
        // pega a data atual e joga mais 5 dias 
        $dataVencimento = date('Y-m-d', strtotime("+3 days"));

        // executa atividade do mercado pago 
        MercadoPago\SDK::setAccessToken($this->sand_token_hom);
        $payment_methods = MercadoPago\SDK::get("/v1/payment_methods");
        $payment = new MercadoPago\Payment();
        $payment->date_of_expiration = $dataVencimento . "T23:59:59.000-03:00";
        $payment->transaction_amount = $valor_final;
        $payment->description = $nome_produto;
        $payment->payment_method_id = "bolbradesco";
        $payment->payer = array(
            "email" => $cliente['emailCliente'],
            "first_name" => $cliente['nomeCliente'],
            "last_name" => $cliente['nomeCliente'],
            "identification" => array(
                "type" => "CPF",
                "number" => $cliente['cpf']
            ),
            "address" => array(
                "zip_code" => $cliente['cep'],
                "street_name" => $cliente['logradouro'],
                "street_number" => $cliente['complemento'],
                "neighborhood" => $cliente['bairro'],
                "city" => $cliente['localidade'],
                "federal_unit" => $cliente['uf'],
            )
        );
        // verifica se tem dados 
        if (!empty($dados)) {
            // gera a nova data
            $novaData = $dataVencimento;
            // atualiza as informações 
            Pagamento::atualizarPagamento($novaData, $dados[0]->id);
        } else {
            // atualiza o status do pedido
            $status = 'aprovado';
            // atualiza o pedido 
            Pedido::atualizarPedido($pedido_id, $status);
            // captura os dados no pagamento
            $pagamento = [
                'status_pagamento' => 'pendente',
                'forma_pagamento' => 'boleto',
                'valor_pago' => $valor_final,
                'data_vencimento' => $dataVencimento,
                'pedido_id' => $pedido_id,
                'cliente_id' => $cliente['idCliente']
            ];
            // salva o pagamento 
            Pagamento::cadastrarPagamento($pagamento);
        }


        //  salva as informações 
        $payment->save();
        //   echo '<pre>', print_r($payment), '</pre>';
        // so usa em produção 
        return redirect($payment->transaction_details->external_resource_url);
        //header("location: ".$payment->transaction_details->external_resource_url);
    }

    public function aguardandoPagamento() {
        $aguardando = Pagamento::listarAguardandoPagamento(auth()->user()->id);
        foreach ($aguardando as $chave => $valor) {
            // passa os valores 
            $dataSenFormatarVencimento = $valor->data_vencimento;
            // formata a data
            $dataFormatadaVencimento = Pagamento::formatarData($dataSenFormatarVencimento);
            // passa os valores 
            $dataCriacaoSemFormatar = $valor->created_at;
            // formata a data
            $dataCriacaoFormatada = Pagamento::formatarData($dataCriacaoSemFormatar);
            // faz a variavel receber o novo valor 
            $aguardando[$chave]->data_vencimento = $dataFormatadaVencimento;
            $aguardando[$chave]->created_at = $dataCriacaoFormatada;
        }

        return view('venda.aguardando_pagamento', compact('aguardando'));
    }

}
