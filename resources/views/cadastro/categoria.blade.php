@extends('layouts.app')

@section('content')
<div class="container">

    <!-- colocando a mensagem de erro -->
    @include('mensagens.erro_cadastro')
    
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
                           
                            <div class="col-3">
                                <label for="nome">NOME:</label>
                                <input type="text" class="form-control" id="nome" value="{{ old('nome') }}" name="nome" placeholder="Nome">
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