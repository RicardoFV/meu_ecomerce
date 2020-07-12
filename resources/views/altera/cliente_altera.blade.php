@extends('layouts.app')

@section('content')
<div class="container">
      <!-- mensagem de Sucesso-->
    @include('mensagens.sucesso')

    <!-- mensagem de erro-->
    @include('mensagens.erro')
    <!-- mensagem sobre o cep-->
    <div id="mensagem" role="alert"></div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Alterar Cliente</div>
                <div class="card-body">
                    <form method="post" action="{{ action('ClienteController@consultarCpf')}}">
                        @Csrf
                        <div class="form-row">
                            <div class="col-3">
                                <label for="meu_cpf">Consultar:</label>
                                <input type="text" maxlength="11" class="form-control" placeholder="Digite o CPF" id="meu_cpf" name="meu_cpf"/>  
                            </div>
                            <div class="col-3">
                                <br>
                                <button  class="btn btn-sm btn-info mt-2">Consultar</button>
                            </div>

                        </div>
                    </form>

                    <hr>

                    @if(isset($cliente))
                    <form method="post" action="{{ action('ClienteController@atualizar',$cliente->id ) }}">
                        @Csrf
                        <div class="form-row">
                            <!-- campo responsavel por dizer que o cadastro esta ativo ou não -->
                            <input type="hidden" id="ativo" name="ativo" value="1">
                            <!-- id do cliente -->

                            <!-- pega o usuario logado -->
                            <input type="hidden" id="usuario_id" name="usuario_id" value="{{$cliente->usuario_id }}">

                            <!-- carrega a sessao  -->
                            @if(isset($pedido))
                            <input type="hidden" id="pedido_id" name="pedido_id" value="{{ $pedido }}">
                            @endif
                            <div class="col-3">
                                <label for="nome">NOME:</label>

                                <input type="text" class="form-control" id="nome" value="{{ $cliente->nome }}" name="nome" placeholder="Nome">

                            </div>
                            <div class="col-3">
                                <label for="email">E-MAIL:</label>

                                <input type="email" readonly="readonly" class="form-control" id="email" value="{{ $cliente->email }}" name="email" placeholder="E-mail">

                            </div>
                            <div class="col-3">
                                <label for="data_nascimento">Data de Nascimento:</label>

                                <input type="date" class="form-control" id="data_nascimento" value="{{$cliente->data_nascimento}}" name="data_nascimento">

                            </div>

                            <div class="col-3">
                                <label for="cpf">CPF:</label>

                                <input type="text" maxlength="11" class="form-control" value="{{$cliente->cpf}}" id="cpf" name="cpf" placeholder="CPF">

                            </div>

                            <div class="col-auto">
                                <label for="cep">CEP:</label>

                                <input type="text" maxlength="8" class="form-control" value="{{ $cliente->cep }}" id="cep" name="cep" placeholder="Cep">

                            </div>

                            <div class="col-auto">
                                <label for="logradouro">LOGRADOURO:</label>

                                <input type="text" id="logradouro" value="{{$cliente->logradouro }}" name="logradouro" class="form-control" placeholder="logradouro">

                            </div>
                            <div class="col-auto">     
                                <label for="complemento">COMPLEMENTO:</label>

                                <input type="text" id="complemento" name="complemento" value="{{$cliente->complemento}}" class="form-control" placeholder="Complemento">

                            </div>

                            <div class="col-auto">
                                <label for="bairro">BAIRRO:</label>

                                <input type="text" id="bairro" name="bairro" value="{{$cliente->bairro}}" class="form-control" placeholder="Bairro">

                            </div>
                            <div class="col-auto">
                                <label for="localidade">LOCALIDADE:</label>

                                <input type="text" id="localidade" name="localidade" value="{{$cliente->localidade}}" class="form-control" placeholder="Localidade">

                            </div>

                            <div class="col-auto">
                                <label for="uf">UF:</label>

                                <input type="text" id="uf" name="uf" value="{{$cliente->uf}}" class="form-control" placeholder="Uf">

                            </div>
                            <div class="col-auto">

                                <label for="telefone">TELEFONE:</label>

                                <input type="text" id="telefone" name="telefone" value="{{$cliente->telefone}}" class="form-control" placeholder="Telefone">

                            </div>
                            <div class="col-auto">
                                <label for="celular">CELULAR:</label>

                                <input type="text" id="celular" name="celular" value="{{$cliente->celular}}" class="form-control" placeholder="Celular">

                            </div>
                        </div>
                        <button class="btn btn-success btn-block mt-3">Atualizar</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection