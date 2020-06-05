<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Http\Requests\CategoriaFormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class CategoriaController extends Controller {

    private $categoria;

    public function __construct() {
        $this->middleware('auth');
        $this->categoria = new App\Categoria;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        if (Gate::allows('adm', Auth::user())) {
            $categoria = Categoria::where('ativo', 1)->get();
            // retorna as informaçoes
            return view('lista.categoria_lista', compact('categoria'));
        } else {
            abort(403, 'Não autorizado');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaFormRequest $request) {
        if (Gate::allows('adm', Auth::user())) {
            //recebe as informações 
            $dadosForm = $request->all();
            // prepara para inserir as informaçoes 
            $inserir = Categoria::create($dadosForm);
            if ($inserir) {
                // redireciona para a tela de cadastro
                return redirect()->action('CategoriaController@index')->with('mensagem', 'Categoria cadastrado com Sucesso !');
            } else {
                // retorna para a mesma tela
                return redirect()->back()->withErrors($dadosForm)->withInput();
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        if (Gate::allows('adm', Auth::user())) {
            // consulta a categoria
            $categoria = Categoria::find($id);
            // faz a verificação
            if (empty($categoria)) {
                return 'categoria não existe';
            } else {
                // retorna o parceiro para a tela de edição
                return view('altera.categoria_altera', [
                    'categoria' => $categoria,
                ]);
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaFormRequest $request, $id) {
        if (Gate::allows('adm', Auth::user())) {
            /// recebe as informações 
            $dadosForm = $request->all();
            // faz a busca por id
            $this->ca = $this->categoria->find($id);
            //faz a atualização
            $atualizar = $this->categoria->update($dadosForm);
            //faz a verificação se foi atualizado corretamente
            if ($atualizar) {
                // redireciona para a tela de cadastro
                return redirect()->action('CategoriaController@index')->with('mensagem', 'Categoria Alterado com Sucesso !');
            } else {
                // se deu errado , volta a tela de cadastro
                return redirect()->back()->withErrors($dadosForm);
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Gate::allows('adm', Auth::user())) {
            // consulta a categoria
            $categoria = Categoria::find($id);
            // altera o campo ativo para 0
            $categoria->ativo = 0;
            // excluir recebe a atividade de excluir
            $excluir = $categoria->push();
            // verifica se deu certo
            if ($excluir) {
                // redireciona para a tela de listagem
                return redirect()->action('CategoriaController@index')
                                ->with('mensagem', 'categoria desativado com Sucesso !');
            } else {
                // redireciona para a tela de cadastro
                return redirect()->back()->with('erro', 'categoria não pode ser removido !');
            }
        }else {
            abort(403, 'Não autorizado');
        }
    }

}
