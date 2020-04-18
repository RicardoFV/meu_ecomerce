<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
    </script>

    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid text-center">
            <h2 class="display-6">Atualizar Parceiro</h2>
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
    <hr>

    <form method="post" action="{{ action('ParceiroController@atualizar', $parceiro->id) }}" method="POST">
        @Csrf
        <div class="form-row">

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
                    <option value="fisica" <?=($parceiro->tipo =='fisica')?'selected':''?> >Fisica</option>
                    <option value="juridica" <?=($parceiro->tipo =='juridica')?'selected':''?> >Juridica</option>
                </select>
            </div>

            <div class="col-3">
                <label for="tipo_documento">CPF/CNPJ:</label>
                <input type="text" class="form-control" value="{{$parceiro->tipo_documento}}" id="tipo_documento" name="tipo_documento" placeholder="CPF/CNPJ">
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
