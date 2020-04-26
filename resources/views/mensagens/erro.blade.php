<!-- mensagem de erro-->
<div class="container">
    @if(session('erro'))
    <div class="alert alert-danger">
        <p>{{session('erro')}}</p>
    </div>
    @endif
</div>
