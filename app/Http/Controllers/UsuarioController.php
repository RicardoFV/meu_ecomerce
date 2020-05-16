<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UsuarioFormRequest;
use App\Pedido;

class UsuarioController extends Controller {

    private $usuario;

    public function __construct() {
        // $this->middleware('auth');
        $this->usuario = new User();
    }

    public function index() {
        if (Gate::allows('adm', Auth::user())) {
            return view('cadastro.usuario');
        } else {
            abort(403, 'Não autorizado');
        }
    }

    public function cadastrarCliente(UsuarioFormRequest $request) {

        $data = $request->except('_token');
        $data['password'] = Hash::make($data['password']);
        $inserir = User::create($data);
        if ($inserir) {
            // pega os dados 
            $credencial = $request->only('email', 'password');
            // altentica o cliente
            Auth::attempt($credencial);
            if (isset($data['pedido_id'])) {
                // recebe a sessao
                $pedido = $data['pedido_id'];
                // recebe a nova sessao
                $sessao_id = session()->getId();
                // atualiza a sessao
                Pedido::atualizarSessao($pedido, $sessao_id);

                return view('cadastro.cliente')->with('pedido', $pedido);
            }
            // direciona para a home 
            return redirect()->route('home');
        } else {
            return redirect()->back()->withErrors($data)->withInput();
        }
    }

    public function cadastrar(UsuarioFormRequest $request) {
        if (Gate::allows('adm', Auth::user())) {
            $data = $request->except('_token');
            $data['password'] = Hash::make($data['password']);
            $inserir = User::create($data);
            if ($inserir) {
                return redirect()->route('usuario.listar')
                                ->with('mensagem', 'Usuáro Cadastro com Sucesso !');
            } else {

                return redirect()->back()->withErrors($data)->withInput();
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    public function atualizar(Request $request, $id) {
        if (Gate::allows('adm', Auth::user())) {
            $data = $request->except('_token');
            $this->usuario = $this->usuario->find($id);
            $atualizar = $this->usuario->update($data);
            if ($atualizar) {
                return redirect()->route('usuario.listar')
                                ->with('mensagem', 'Usuáro Alterado com Sucesso !');
            } else {
                return redirect()->back()->withErrors($data);
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    public function consultar($id) {
        if (Gate::allows('adm', Auth::user())) {
            $usuario = User::find($id);
            if (empty($usuario)) {
                echo 'usuario não existe';
            } else {
                return view('altera.usuario_altera', compact('usuario'));
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    public function deletar($id) {
        if (Gate::allows('adm', Auth::user())) {
            $usuario = User::find($id);
            $usuario->ativo = 0;
            $excluir = $usuario->push();
            if ($excluir) {
                return redirect()->route('usuario.listar')
                                ->with('mensagem', 'Usuáro desativado com Sucesso !');
            } else {
                // redireciona para a lista
                return redirect()->back()->with('erro', 'Usuáro não pode ser removido !');
            }
        } else {
            abort(403, 'Não autorizado');
        }
    }

    public function listar() {
        if (Gate::allows('adm', Auth::user())) {
            $usuarios = User::where('ativo', 1)->get();
            return view('lista.usuario_lista', compact('usuarios'));
        } else {
            abort(403, 'Não autorizado');
        }
    }

}
