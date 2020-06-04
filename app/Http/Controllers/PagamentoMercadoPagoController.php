<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago;
use App\PedidoItem;

class PagamentoMercadoPagoController extends Controller {
    
    // homologaçao / teste 
    private $sand_key_hom ='TEST-9158a998-d3e6-4374-abb4-7d9484d656c8' ;
    private $sand_token_hom ='TEST-5310965525503370-051823-2699a1d4c2e8138abcd476b39c70f433-570231747';
    
    // produção
    private $sand_key_prod ='APP_USR-5ba23260-6b26-4d76-9353-00a8b5b61230' ;
    private $sand_token_prod ='APP_USR-4667265261301949-060120-c4a9c447639676c6a778df8ba8c4fe41-199421913';
    //pagamento via boleto 

    public function gerarBoleto(Request $request) {
        // recebe o cliente 
        $idCliente = $request->get('idcliente');
        //consulta o pedido pelo idcliente
        $itens = PedidoItem::listarItensPorCliente($idCliente);
        
        $dados = null ;
        foreach ($itens as $iten){
            $dados += $iten->valor;
        }
        
          echo '<pre>';
        print_r($dados);exit();
         echo '</pre>'; 
        
        MercadoPago\SDK::setAccessToken($this->sand_token_hom);

        $payment_methods = MercadoPago\SDK::get("/v1/payment_methods");
        $payment = new MercadoPago\Payment();
        $payment->date_of_expiration = "2020-06-07T21:52:49.000-04:00";
        $payment->transaction_amount = $request['valor_final'];
        $payment->description = '';
        $payment->payment_method_id = "bolbradesco";
        $payment->payer = array(
            "email" => "test_user_1965372@testuser.com",
            "first_name" => "Test",
            "last_name" => "User",
            "identification" => array(
                "type" => "CPF",
                "number" => "19119119100"
            ),
            "address" => array(
                "zip_code" => "06233200",
                "street_name" => "Av. das Nações Unidas",
                "street_number" => "3003",
                "neighborhood" => "Bonfim",
                "city" => "Osasco",
                "federal_unit" => "SP"
            )
        );

        $payment->save();

     //   echo '<pre>', print_r($payment), '</pre>';
        
        // so usa em produção 
        return redirect($payment->transaction_details->external_resource_url);
        //header("location: ".$payment->transaction_details->external_resource_url);
    }

}
