<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">Loja Virtual - RN Tecnologia</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
            <?php if(auth()->guard()->check()): ?>
            <ul class="navbar-nav m-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/carrinho">Carrinho</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/contato">Contatos</a>
                </li>
            </ul>
            <?php endif; ?>
            <form class="form-inline my-2 my-lg-0">
                <div class="input-group input-group-sm">
                    <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                    <div class="input-group-append">
                        <button type="button" class="btn btn-secondary btn-number">
                            <i class="fa fa-search"></i>
                        </button>
                    </div>
                </div>
                <a class="btn btn-success btn-sm ml-3" href="/carrinho">
                    <i class="fa fa-shopping-cart"></i> Carrinho
                    <span class="badge badge-light">

                    </span>
                </a>
            </form>
            <ul class="navbar-nav ml-auto">
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
<?php /**PATH C:\Projetos\laravel\meu_estoque\resources\views/menu/menu_principal.blade.php ENDPATH**/ ?>