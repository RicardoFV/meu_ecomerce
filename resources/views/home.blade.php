@extends('layouts.layout')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Marcas</div>
                <ul class="list-group category_block">
                    
                        <li class="list-group-item"><a href=""></a></li>
                    
                </ul>
            </div>
            <div class="card bg-light mb-3">
                <div class="card-header bg-success text-white text-uppercase">Último Produto</div>
                <div class="card-body">
                    <img class="img-fluid" src="" />
                    <h5 class="card-title"></h5>
                    <p class="card-text"></p>
                    <p class="bloc_left_price"></p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="row">
           @foreach($produtos as $produto)
                <div class="col-12 col-md-6 col-lg-4 mb-5">
                    <div class="card">
                        <img class="card-img-top" src="{{url("storage/$produto->imagem") }}" alt="Card image cap">
                        <div class="card-body">
                            <h4 class="card-title"><a href="" title="ver Produto">
                                {{$produto->nome}}
                                </a>
                            </h4>
                            <p class="card-text">
                                
                            </p>
                            <div class="row">
                                <div class="col">
                                    <p class="btn btn-danger btn-block">R$
                                        {{$produto->preco}}
                                    </p>
                                </div>
                                <div class="col">
                                    <a href="informacao/produto/{{$produto->id}}" class="btn btn-success btn-block">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
