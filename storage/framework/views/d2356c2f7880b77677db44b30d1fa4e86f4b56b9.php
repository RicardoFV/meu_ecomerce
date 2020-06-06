<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Loja Virtual - RN Tecnologia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">

            <ul class="navbar-nav m-auto">
                <?php if(auth()->guard()->check()): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('adm', Auth::user())): ?>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cadastros
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo e(route('parceiro')); ?>">Parceiros</a>
                        <a class="dropdown-item" href="<?php echo e(route('produto')); ?>">Produtos</a>  
                        <a class="dropdown-item" href="<?php echo e(route('usuario')); ?>">Usuário</a>
                    </div>

                </li>
                <li class="nav-item dropdown">

                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Relatorios
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="<?php echo e(route('parceiro.listar')); ?>">Parceiros</a>
                        <a class="dropdown-item" href="<?php echo e(route('produto.listar')); ?>">Produtos</a>
                        <a class="dropdown-item" href="<?php echo e(route('usuario.listar')); ?>">Usuario</a>
                    </div>

                </li>
                <?php endif; ?>
                <?php endif; ?>

            </ul>

            <form class="form-inline my-2 my-lg-0">

                <a class="btn btn-success btn-sm ml-5" href="/carrinho">
                    <i class="fa fa-shopping-cart"></i> Carrinho
                    <span class="badge badge-light">

                    </span>
                </a>
            </form>
            <ul class="navbar-nav ml-1">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Acessar')); ?></a>
                </li>
                <?php if(Route::has('register')): ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Registre-se')); ?></a>
                </li>
                <?php endif; ?>
                <?php else: ?>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                           onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                            <?php echo e(__('Logout')); ?>

                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>
                </li>
                <?php endif; ?>
            </ul>

        </div>
    </div>
</nav>
<?php /**PATH C:\Projetos\laravel\meu_estoque\resources\views/esqueleto_projeto/menu_principal.blade.php ENDPATH**/ ?>