<!-- mensagem de erro-->
    @if(session('erro'))
    <div class="alert alert-danger">
        <p>{{session('erro')}}</p>
    </div>
    @endif