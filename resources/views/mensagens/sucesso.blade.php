<div class="container">
    <!-- mensagem de sucesso-->
    @if(session('mensagem'))
    <div class="alert alert-success">
        <p>{{session('mensagem')}}</p>
    </div>
    @endif
</div>

