<?php

namespace App\Http\Controllers;

use App\Parceiro;
use App\Produto;
use App\Http\Requests\ProdutoFormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use App\Categoria;

class ProdutoController extends Controller {

    // criação da controler com as informaçoes do produto

    private $produto;

    public function __construct() {
        $this->middleware('auth');
        $this->produto = new Produto();
    }

    public function index() {
        // verifico a permissão 
        if (Gate::allows('adm', Auth::user())) {
            // chamo o parceiro e categoria
            $parceiros = Parceiro::where('ativo', 1)->get();
            $categorias = Categoria::where('ativo', 1)->get();
            // faço o retorno 
            return view('cadastro.produto', [
                'parceiros' => $parceiros,
                'categorias' => $categorias
            ]);
        } else {
            abort(403, 'Não autorizado');
        }
    }

    // faz o cadastro do parceiro
    public function cadastrar(ProdutoFormRequest $request) {
        // verifico a permissão 
        if (Gate::allows('adm', Auth::user())) {
            // verifica se tem o arquivo
            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                // pega o nome do arquivo 
                $nomeArquivoAtual = $request->file('imagem')->getClientOriginalName();
                // pega a extensão do arquivo 
                $extensaoAqeuivo = $request->file('imagem')->extension();
                // faz o novo nome do arquivo
                $novoNome = "{$nomeArquivoAtual}.{$extensaoAqeuivo}";
                // faz o upload
                $upload = $request->file('imagem')->storeAs('imagens', $novoNome);
                // caso de certo o uploud
                if ($upload) {
                    // faz a inserção dos dados no banco.
                    $inserir = Produto::create([
                                'ativo' => $request->input('ativo'),
                                'usuario_id' => $request->input('usuario_id'),
                                'nome' => $request->input('nome'),
                                'descricao' => $request->input('descricao'),
                                'preco' => $request->input('preco'),
                                'quantidade' => $request->input('quantidade'),
                                'parceiro_id' => $request->input('parceiro_id'),
                                'categoria_id' => $request->input('categoria_id'),
                                'imagem' => $upload  // pega o caminho do arquivo
                    ]);
                    // verifica se deu certo a inserção
                    if ($inserir) {
                        return redirect()->action('ProdutoController@listar')
                                        ->with('mensagem', 'Produto cadastrado com sucesso !');
                    } else {
                        // retorna para a mesma tela
                        return redirect()->back()->withErrors($request->all())->withInput();
                    }
                }
            } else {
                // cria a variavel fazendo a inclucao
                $inserir = Produto::create([
                            'ativo' => $request->input('ativo'),
                            'nome' => $request->input('nome'),
                            'descricao' => $request->input('descricao'),
                            'preco' => $request->input('preco'),
                            'usuario_id' => $request->input('usuario_id'),
                            'quantidade' => $request->input('quantidade'),
                            'parceiro_id' => $request->input('parceiro_id'),
                            'categoria_id' => $request->input('categoria_id'),
                            'imagem' => 'sem imagem'  // caso não tenha imagem
                ]);
                //verifica se foi feito a inclusão 
                if ($inserir) {
                    return redirect()->action('ProdutoController@listar')
                                    ->with('mensagem', 'Produto cadastrado com sucesso !');
                } else {
                    // retorna para a mesma tela 
                    return redirect()->back()->withErrors($request->all())->withInput();
                }
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    // faz a atualização das infomrações 
    public function atualizar(ProdutoFormRequest $request, $id) {
        // verifico a permissão 
        if (Gate::allows('adm', Auth::user())) {
            // faz a consulta 
            $this->produto = $this->produto->find($id);

            if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
                // pega o nome do arquivo 
                $nomeArquivoAtual = $request->file('imagem')->getClientOriginalName();
                // pega a extensão do arquivo 
                $extensaoAqeuivo = $request->file('imagem')->extension();
                // faz o novo nome do arquivo
                $novoNome = "{$nomeArquivoAtual}.{$extensaoAqeuivo}";
                // faz o upload
                $upload = $request->file('imagem')->storeAs('imagens', $novoNome);
                // caso de certo o uploud
                if ($upload) {
                    // passa as informações para o objeto 
                    $this->produto->ativo = $request->input('ativo');
                    $this->produto->nome = $request->input('nome');
                    $this->produto->descricao = $request->input('descricao');
                    $this->produto->preco = $request->input('preco');
                    $this->produto->usuario_id = $request->input('usuario_id');
                    $this->produto->quantidade = $request->input('quantidade');
                    $this->produto->parceiro_id = $request->input('parceiro_id');
                    $this->produto->categoria_id = $request->input('categoria_id');
                    $this->produto->imagem = $upload;
                    $atualizar = $this->produto->save();
                    // verifica se deu certo a inserção
                    if ($atualizar) {
                        return redirect()->action('ProdutoController@listar')
                                        ->with('mensagem', 'Produto alterado com sucesso !');
                    } else {
                        // retorna para a mesma tela 
                        return redirect()->back()->withErrors($request->all())->withInput();
                    }
                }
            } else {
                // passa as informações para o objeto 
                $this->produto->ativo = $request->input('ativo');
                $this->produto->nome = $request->input('nome');
                $this->produto->descricao = $request->input('descricao');
                $this->produto->preco = $request->input('preco');
                $this->produto->usuario_id = $request->input('usuario_id');
                $this->produto->quantidade = $request->input('quantidade');
                $this->produto->parceiro_id = $request->input('parceiro_id');
                $this->produto->categoria_id = $request->input('categoria_id');
                $this->produto->imagem = $request->input('sem_imagem'); // caso não tenha imagem
                $atualizar = $this->produto->save();
                //verifica se foi feito a inclusão 
                if ($atualizar) {
                    return redirect()->action('ProdutoController@listar')
                                    ->with('mensagem', 'Produto cadastrado com sucesso !');
                } else {
                    return redirect()->action('ProdutoController@index')
                                    ->withErrors($request->all())->withInput();
                }
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    // faz a consulta
    public function consultar($id) {
        if (Gate::allows('adm', Auth::user())) {
            // faz a consulta com base no id e fazendo um join com parceiros
            $produto = Produto::find($id);
            // recebe o parceiro 
            $parceiro_id = $produto->parceiro_id;
            // recebe a categoria
            $categoria_id = $produto->categoria_id;
            // consulta o parceiro
            $parceiro = Parceiro::find($parceiro_id);
            // consultando a categoria
            $categoria = Categoria::find($categoria_id); 
      
            // verifica se ativo veio 0 ou não
            if ($parceiro->ativo == 0 && $categoria->ativo == 0) {
                return redirect()->action('ProdutoController@listar')
                                ->with('erro', 'Produto desativado, não pode ser alterado !');
            } else {
                // chamo o parceiro
                $parceiros = Parceiro::where(['tipo' => 'juridica', 'ativo' => 1])->get();
                //chama a Categoria
                $categorias = Categoria::where('ativo', 1)->get();
                // quando o nome é igual , pode colocar assim
                return view('altera.produto_altera')->with([
                            'produto' => $produto,
                            'parceiros' => $parceiros,
                            'categorias' => $categorias
                ]);
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    // metodo que faz a deleção logica 
    public function deletar($id) {
        if (Gate::allows('adm', Auth::user())) {
            // faz a consulta
            $produto = Produto::find($id);

            // muda o parametro do ativo para 0
            $produto->ativo = 0;
            //cria uma variavel que recebe a exclusão logica
            $excluir = $produto->push();
            if ($excluir) {
                return redirect()->action('ProdutoController@listar')
                                ->with('mensagem', 'Produto desativado com sucesso !');
            } else {
                // redireciona para a tela de cadastro
                return redirect()->back()->with('erro', 'Produto não pode ser removido !');
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    // lista os produtos que esta ativo
    public function listar() {
        if (Gate::allows('adm', Auth::user())) {
            // faz um select fazendo um relacinamento entre produtos e parceiros 
            // retorna todos os produtos com base no id send iguak ao parceiros
            $produtos = DB::table('produtos')
                            ->join('parceiros', 'produtos.parceiro_id', '=', 'parceiros.id')
                            ->join('categorias', 'produtos.categoria_id', '=','categorias.id' )
                            ->select('produtos.*', 'parceiros.nome as nomeProduto', 'categorias.nome as nomeCategoria')
                            ->where('produtos.ativo', 1)->get();
            // retorna o dados 
            return view('lista.produto_lista')->with('produtos', $produtos);
        } else {
            abort(403, 'Não autorizado');
        }
    }

}
