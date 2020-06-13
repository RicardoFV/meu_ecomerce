<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago;
use App\PedidoItem;
use DateTime;
use App\Pedido;
use App\Pagamento;

class PagamentoMercadoPagoController extends Controller {

    // homologaçao / teste 
    private $sand_key_hom = 'TEST-9158a998-d3e6-4374-abb4-7d9484d656c8';
    private $sand_token_hom = 'TEST-5310965525503370-051823-2699a1d4c2e8138abcd476b39c70f433-570231747';
    // produção
    private $sand_key_prod = 'APP_USR-5ba23260-6b26-4d76-9353-00a8b5b61230';
    private $sand_token_prod = 'APP_USR-4667265261301949-060120-c4a9c447639676c6a778df8ba8c4fe41-199421913';

    //pagamento via boleto 

    public function gerarBoleto(Request $request) {


        $dataAtual = new DateTime();

        // recebe o cliente 
        $idCliente = $request->get('idcliente');
        //consulta o pedido pelo idcliente
        $itens = PedidoItem::listarItensPorCliente($idCliente);
        // cria as variaveis que serão colocados no boleto     
        $valor_final = null;
        $nome_produto = '';
        $cliente = null;
        $status = null; 
        foreach ($itens as $iten) {
            /*
            echo '<pre>';
            print_r($iten);
            echo '</pre>';

            echo '<pre>';
            print_r($dataAtual->format('Y-m-d H:i:s'));
            echo '</pre>';

            dd();
            */
            $valor_final += $iten->valor;
            $nome_produto .= $iten->produtoNome . ' | ';
            $status = $iten->status;
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

        MercadoPago\SDK::setAccessToken($this->sand_token_hom);

        $payment_methods = MercadoPago\SDK::get("/v1/payment_methods");
        $payment = new MercadoPago\Payment();
        $payment->date_of_expiration = "2020-06-13T21:52:49.000-04:00";
        $payment->transaction_amount =  $valor_final;
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

        $payment->save();

        //   echo '<pre>', print_r($payment), '</pre>';
        // so usa em produção 
        return redirect($payment->transaction_details->external_resource_url);
        //header("location: ".$payment->transaction_details->external_resource_url);
    }

}
