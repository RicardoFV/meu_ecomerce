<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;

class VendaController extends Controller
{
    
   public function index() {
       // busca o produto
       $produtos = Produto::where('ativo', 1)->get();
       // retorna os produtos
       return view('home')->with('produtos', $produtos);
   }
}
