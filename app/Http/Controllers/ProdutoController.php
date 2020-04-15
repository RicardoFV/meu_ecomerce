<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Parceiro;

class ProdutoController extends Controller {

    // criação da controler com as informaçoes do produto

    public function index() {
        // chamo o parceiro
        $parceiros = Parceiro::where('tipo', 'juridica')->get();
        // faço o retorno 
        return view('cadastro.produto', ['parceiros' => $parceiros]);
    }

    public function cadastrar(Request $request) {
        //defino o valor padrão da variavel que contem o nome do arquivo
        $nomeArquivo = null;

        // verifica o arquivo , se foi enviado e se ele existe
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
            // recupera a extensão do arquivo
            $extensao = $request->imagem->extension();
            //define o nome final 
            $nomeArquivo = "{$name}.{$extensao}";
            // faz o upload
            $upload = $request->imagem->storeAs('imagens', $nomeArquivo);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/imagens/nomedinamicoarquivo.extensao
            if(!$upload){
                return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
            }else {
                echo $upload;
            }
        }
    }

}
