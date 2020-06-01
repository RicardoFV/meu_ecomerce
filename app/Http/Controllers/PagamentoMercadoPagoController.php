<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagamentoMercadoPagoController extends Controller
{
    //pagamento via boleto 
    
    public function gerarBoleto(Request $request) {
        print_r($request->all()); exit();
    }
}
