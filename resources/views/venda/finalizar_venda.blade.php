@extends('layouts.layout')

@section('conteudo')

<div>
    <div class="row">
        <div class="col-sm-7">

            <h5 class="ml-5 mb-2">Meu Carrinho</h5>
            <div class="card ml-5 col-sm-7">
                @foreach($itens as $item)
                <div class="card-body d-flex">

                    <img src="{{ url("storage/{$produto[0]->imagem}")}}" width="50" height="50">
                    <p class=" ml-2 mt-4"> <strong>{{$produto[0]->nome }}</strong> </p>
                    <span class=" ml-2 mt-4">Quantidade : {{ $item->quantidade }}</span>
                    <span class=" ml-3 mt-4">R$ {{ $item->valor }}</span>
                    <div class="mt-3 ml-5 ">
                        <a href="" class="btn btn-danger btn-sm d-inline">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

        <div class="col-sm-5">

            <div class="card w-50 mr-5 ml-5">
                <div class="card-header">
                    <h5 class="card-title text-center">Finalizar Compra</h5>
                </div>
                <div class="card-body">
                    <p class="card-text"> <strong>Total : R$ {{$item->valor}}</strong></p>
                    <a href="#" class="btn btn-success btn-block">Efetuar Pagamento</a>
                </div>
            </div>  

        </div>
    </div>
</div>




{{ $cliente }}

<br><br>

{{ $itens }}

<br><br>

{{ $produto }}



@endsection