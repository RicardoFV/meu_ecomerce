<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Loja Virtual - RN Tecnologia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">

            <ul class="navbar-nav m-auto">
                @auth

                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Minhas Compras
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('pagamento_boleto_pendente') }}">Aguardando Pagamento</a> 
                        <a class="dropdown-item" href="">Aprovadas</a> 
                        <a class="dropdown-item" href="{{route('carrinho.pendentes')}}">Pendentes</a> 
                    </div>

                </li>

                @can('adm', Auth::user())
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastros
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('categoria') }}">Categoria</a>
                        <a class="dropdown-item" href="{{ route('parceiro') }}">Parceiros</a>
                        <a class="dropdown-item" href="{{ route('produto') }}">Produtos</a>  
                        <a class="dropdown-item" href="{{ route('usuario') }}">Usuário</a>
                    </div>

                </li>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Relatorios
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('categoria.listar') }}">Categoria</a>
                        <a class="dropdown-item" href="{{ route('parceiro.listar') }}">Parceiros</a>
                        <a class="dropdown-item" href="{{ route('produto.listar') }}">Produtos</a>
                        <a class="dropdown-item" href="{{ route('usuario.listar') }}">Usuario</a>
                    </div>

                </li>
                @endcan

                @endauth

            </ul>

            <form class="form-inline my-2 my-lg-0">

                <a class="btn btn-success btn-sm ml-5" href="{{ route('carrinho.listar')}}">
                    <i class="fa fa-shopping-cart"></i> Carrinho
                    <span class="badge badge-light">
                        @if(!empty(Session::get('carrinho')))
                        {{ Session::get('carrinho') }}
                        @else
                        0
                        @endif
                    </span>
                </a>
            </form>
            <ul class="navbar-nav ml-1">
                <!-- Authentication Links -->
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Acessar') }}</a>
                </li>
                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registre-se') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>
