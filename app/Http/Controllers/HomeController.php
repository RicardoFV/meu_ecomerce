<?php

namespace App\Http\Controllers;
use App\Produto;
use App\Pedido;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produtos = Produto::where('ativo',1)->get();
        return view('home', compact('produtos'));
    }
    
    public function consultar($id) {
       $produto = Produto::find($id);
       return view('venda.informacao_produto' , compact('produto'));
   }
}
