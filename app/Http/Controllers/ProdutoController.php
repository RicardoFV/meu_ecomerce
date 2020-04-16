<?php

namespace App\Http\Controllers;
use App\Parceiro;
use App\Produto;
use App\Http\Requests\ProdutoFormRequest;

class ProdutoController extends Controller {

    // criação da controler com as informaçoes do produto

    public function index() {
        // chamo o parceiro
        $parceiros = Parceiro::where('tipo', 'juridica')->get();
        // faço o retorno 
        return view('cadastro.produto', ['parceiros' => $parceiros]);
    }

    public function cadastrar(ProdutoFormRequest $request) {
        // verifica se tem o arquivo
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            // pega o nome do arquivo 
            $nomeArquivoAtual = $request->file('imagem')->getClientOriginalName();
            // pega a extensão do arquivo 
            $extensaoAqeuivo = $request->file('imagem')->extension();
            // faz o novo nome do arquivo
            $novoNome = "{$nomeArquivoAtual}.{$extensaoAqeuivo}";
            // faz o upload
            $upload = $request->file('imagem')->storeAs('imagens', $novoNome);
            // caso de certo o uploud
            if($upload){
                // faz a inserção dos dados no banco.
                $inserir = Produto::create([
                    'nome'=>$request->input('nome'),
                    'descricao'=>$request->input('descricao'), 
                    'preco'=>$request->input('preco'),
                    'quantidade'=>$request->input('quantidade'),
                    'parceiro_id'=>$request->input('parceiro_id'),
                    'imagem'=>$upload  // pega o caminho do arquivo
                ]);
                // verifica se deu certo a inserção
                if($inserir){
                    return redirect()->action('ProdutoController@index');
                }else {
                    echo 'erro';
                }
            }    
        }
    }

}
