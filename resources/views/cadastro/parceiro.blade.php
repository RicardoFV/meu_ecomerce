@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid text-center">
            <h1 class="display-4">Parceiro</h1>
    </div>
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

    <!-- mensagem de sucesso-->
    @if(session('mensagem'))
        <div class="alert alert-success">
            <p>{{session('mensagem')}}</p>
        </div>
    @endif
    <hr>

    <form method="post" action="{{route('parceiro.cadastrar')}}">
        @Csrf
        <div class="form-row">

            <div class="col-3">
                <label for="nome">NOME:</label>
                <input type="text" class="form-control" id="nome" value="{{old('nome')}}" name="nome" placeholder="Nome">
            </div>
            <div class="col-3">
                <label for="email">E-MAIL:</label>
                <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email" placeholder="E-mail">
            </div>
            <div class="col-3">
                <label for="tipo">TIPO:</label>
                <select name="tipo" id="tipo" class="form-control">
                    <option value="fisica">Fisica</option>
                    <option value="juridica">Juridica</option>
                </select>
            </div>

            <div class="col-3">
                <label for="tipo_documento">CPF/CNPJ:</label>
                <input type="text" class="form-control" value="{{old('tipo_documento')}}" id="tipo_documento" name="tipo_documento" placeholder="CPF/CNPJ">
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
        <hr>
    
        <button class="btn btn-success btn-block mt-3">Cadastrar</button>
    </form>

</div>
@endsection


<script>
    // inicio do codigo jquery
    $(document).ready(function(){
       // no momento que sai do campo 
        $('body').on('blur','#cep', function(){
            let cep = $('#cep').val()

            // verifica se o que esta dentro esta vazio, e outras verificações
            if(cep == ''){
                // coloca a mensagem 
                alert('não pode ser vazio')
            }if(cep.length <8){
                alert('dados insuficientes ')
            }if(cep.length >8){
                alert('Cep incorreto ')
            }else{
                // faz a requisição 
                $.ajax({
                type:'get',
                url:'https://viacep.com.br/ws/'+cep+'/json/',
                dataType:'json', 
                success:function(resposta){
                    if(resposta.erro == true){
                        alert('Cep incorreto ')
                    }else {
                        // coloca os dados nas variaveis 
                        //$('#meu_cep').val(resposta.cep)
                        $('#logradouro').val(resposta.logradouro)
                        $('#complemento').val(resposta.complemento)
                        $('#bairro').val(resposta.bairro)
                        $('#localidade').val(resposta.localidade)
                        $('#uf').val(resposta.uf)
                    }
                   
                },
                error:function(erro){
                    console.log(erro)
                }
            })
            } 
           
        })


    })


</script>
