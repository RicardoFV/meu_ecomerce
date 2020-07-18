@extends('layouts.layout')

@section('conteudo')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-3">
            <div class="card bg-light mb-3">
                <div class="card-header bg-secondary text-white text-uppercase"><i class="fa fa-list"></i> Categorias</div>
                <ul class="list-group category_block">
                    @foreach($categorias as $categoria)
                    <li class="list-group-item">
                        <a href="{{ route('produto.categoria',$categoria->id) }}">{{ $categoria->nome }}</a>
                    </li>
                    @endforeach
                </ul>
            </div>
            
        </div>
        
        <div class="col">
            
            <div class="row">
                @foreach($produtos as $produto)
                <div class="col-6 col-md-6 col-lg-4 mb-5">

                    <div class="text-center mr-2">
                        <img class="card-img-top" src="{{url("storage/$produto->imagem") }}" width="50px" height="178">
                        <h5 class="mt-3"> R$ {{ number_format($produto->preco,2, ',','.') }}</h5>
                        <h3 class="mt-0">{{$produto->nome}}</h3>
                        
                        <div class="col mt-1">
                            <a href="{{ route('informacao.venda',$produto->id ) }}" class="btn btn-secondary btn-block">Comprar</a>
                        </div> 
                    </div>
                    
                </div>
                
                @endforeach
                
            </div>
            
        </div>

    </div>
</div>
@endsection
