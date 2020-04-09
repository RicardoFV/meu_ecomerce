@extends('layouts.app')

@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">Parceiro</h1>
        </div>
    </div>

    <form>
    <div class="form-row">
        <div class="col-4">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" placeholder="Digite o nome">
        </div>
        
        <div class="col-4">
            <label for="nome">Tipo:</label>
            <input type="text" class="form-control" placeholder="Sobrenome">
        </div>
    </div>
</form>

</div>
@endsection
