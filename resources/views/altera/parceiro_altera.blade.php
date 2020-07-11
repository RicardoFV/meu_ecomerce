@extends('layouts.app')

@section('content')
<div class="container">

    <!-- colocando a mensagem de erro -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Alterar Parceiro</div>
                <div class="card-body">
                    <form method="post" action="{{ action('ParceiroController@atualizar', $parceiro->id) }}" method="POST">
                        @Csrf
                        <div class="form-row">
                            <!-- campo responsavel por dizer que o cadastro esta ativo ou não -->
                            <input type="hidden" id="ativo" name="ativo" value="{{$parceiro->ativo}}">
                            <!-- pega o usuario logado -->
                            <input type="hidden" id="usuario_id" name="usuario_id" value="{{Auth::user()->id }}"> 
                            <div class="col-3">
                                <label for="nome">NOME:</label>
                                <input type="text" class="form-control" id="nome" value="{{$parceiro->nome}}" name="nome" placeholder="Nome">
                            </div>
                            <div class="col-3">
                                <label for="email">E-MAIL:</label>
                                <input type="email" class="form-control" id="email" value="{{$parceiro->email}}" name="email" placeholder="E-mail">
                            </div>
                            <div class="col-3">
                                <label for="tipo">TIPO:</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="fisica" <?= ($parceiro->tipo == 'fisica') ? 'selected' : '' ?> >Fisica</option>
                                    <option value="juridica" <?= ($parceiro->tipo == 'juridica') ? 'selected' : '' ?> >Juridica</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="tipo_documento">CPF/CNPJ:</label>
                                <input type="text" maxlength="14" class="form-control" value="{{$parceiro->tipo_documento}}" id="tipo_documento" name="tipo_documento" placeholder="CPF/CNPJ">
                            </div>

                            <div class="col-auto">
                                <label for="cep">CEP:</label>
                                <input type="text" class="form-control" value="{{$parceiro->cep}}" id="cep" name="cep" placeholder="Cep">
                            </div>

                            <div class="col-auto">
                                <label for="logradouro">LOGRADOURO:</label>
                                <input type="text" id="logradouro" value="{{$parceiro->logradouro}}" name="logradouro" class="form-control" placeholder="logradouro">
                            </div>
                            <div class="col-auto">
                                <label for="complemento">COMPLEMENTO:</label>
                                <input type="text" id="complemento" name="complemento" value="{{$parceiro->complemento}}" class="form-control" placeholder="Complemento">
                            </div>

                            <div class="col-auto">
                                <label for="bairro">BAIROO:</label>
                                <input type="text" id="bairro" name="bairro" value="{{$parceiro->bairro}}" class="form-control" placeholder="Bairro">
                            </div>
                            <div class="col-auto">
                                <label for="localidade">LOCALIDADE:</label>
                                <input type="text" id="localidade" name="localidade" value="{{$parceiro->localidade}}" class="form-control" placeholder="Localidade">
                            </div>

                            <div class="col-auto">
                                <label for="uf">UF:</label>
                                <input type="text" id="uf" name="uf" value="{{$parceiro->uf}}" class="form-control" placeholder="Uf">
                            </div>
                            <div class="col-auto">
                                <label for="telefone">TELEFONE:</label>
                                <input type="text" id="telefone" name="telefone" value="{{$parceiro->telefone}}" class="form-control" placeholder="Telefone">
                            </div>
                            <div class="col-auto">
                                <label for="celular">CELULAR:</label>
                                <input type="text" id="celular" name="celular" value="{{$parceiro->celular}}" class="form-control" placeholder="Celular">
                            </div>
                        </div>


                        <button class="btn btn-success btn-block mt-3">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection