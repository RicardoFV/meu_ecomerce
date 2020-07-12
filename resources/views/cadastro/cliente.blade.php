@extends('layouts.app')

@section('content')
<div class="container">

    <!-- colocando a mensagem de erro -->
    @include('mensagens.erro_cadastro')
    
     <!-- colocando a mensagem de erro -->
    @include('mensagens.erro')

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Cadastro de Cliente</div>
                <div class="card-body">

                    <form method="post" action="{{ route('cliente.cadastrar') }}">
                        @Csrf
                        <div class="form-row">
                            <!-- campo responsavel por dizer que o cadastro esta ativo ou não -->
                            <input type="hidden" id="ativo" name="ativo" value="1">
                            <!-- pega o usuario logado -->
                            <input type="hidden" id="usuario_id" name="usuario_id" value="{{Auth::user()->id }}">
                            <!-- carrega a sessao  -->
                            @if(isset($pedido))
                            <input type="hidden" id="pedido_id" name="pedido_id" value="{{ $pedido }}">
                            @endif
                            <div class="col-3">
                                <label for="nome">NOME:</label>
                                <input type="text" readonly="readonly"  class="form-control" id="nome" value="{{ Auth::user()->name }}" name="nome" placeholder="Nome">
                            </div>
                            <div class="col-3">
                                <label for="email">E-MAIL:</label>
                                <input type="email" readonly="readonly" class="form-control" id="email" value="{{ Auth::user()->email }}" name="email" placeholder="E-mail">
                            </div>
                            <div class="col-3">
                                <label for="data_nascimento">Data de Nascimento:</label>
                                <input type="date" class="form-control" id="data_nascimento" name="data_nascimento">
                            </div>

                            <div class="col-3">
                                <label for="cpf">CPF:</label>
                                <input type="text" maxlength="11" class="form-control" value="{{old('cpf')}}" id="cpf" name="cpf" placeholder="CPF">
                            </div>

                            <div class="col-auto">
                                <label for="cep">CEP:</label>
                                <input type="text" class="form-control" value="{{old('cep')}}" id="cep" name="cep" placeholder="Cep">
                            </div>

                            <div class="col-auto">
                                <label for="logradouro">LOGRADOURO:</label>
                                <input type="text" id="logradouro" value="{{old('logradouro')}}" name="logradouro" class="form-control" placeholder="logradouro">
                            </div>
                            <div class="col-auto">
                                <label for="complemento">COMPLEMENTO:</label>
                                <input type="text" id="complemento" name="complemento" value="{{old('complemento')}}" class="form-control" placeholder="Complemento">
                            </div>

                            <div class="col-auto">
                                <label for="bairro">BAIROO:</label>
                                <input type="text" id="bairro" name="bairro" value="{{old('bairro')}}" class="form-control" placeholder="Bairro">
                            </div>
                            <div class="col-auto">
                                <label for="localidade">LOCALIDADE:</label>
                                <input type="text" id="localidade" name="localidade" value="{{old('localidade')}}" class="form-control" placeholder="Localidade">
                            </div>

                            <div class="col-auto">
                                <label for="uf">UF:</label>
                                <input type="text" id="uf" name="uf" value="{{old('uf')}}" class="form-control" placeholder="Uf">
                            </div>
                            <div class="col-auto">
                                <label for="telefone">TELEFONE:</label>
                                <input type="text" id="telefone" name="telefone" value="{{old('telefone')}}" class="form-control" placeholder="Telefone">
                            </div>
                            <div class="col-auto">
                                <label for="celular">CELULAR:</label>
                                <input type="text" id="celular" name="celular" value="{{old('celular')}}" class="form-control" placeholder="Celular">
                            </div>
                        </div>
                        <button class="btn btn-success btn-block mt-3">Cadastrar</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection