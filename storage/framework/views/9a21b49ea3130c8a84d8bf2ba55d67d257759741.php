

<?php $__env->startSection('content'); ?>

<div class="container">
    <!-- mensagem de Sucesso-->
    <?php echo $__env->make('mensagens.sucesso', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <!-- mensagem de erro-->
    <?php echo $__env->make('mensagens.erro', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Lista de Produtos</div>
                <div class="card-body">
                    <table class="table table-sm table-bordered table-hover">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Imagem</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Descricao</th>
                                <th scope="col">Valor Unitario</th>
                                <th scope="col">Parceiro</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $__currentLoopData = $produtos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produto): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <img src="<?php echo e(url("storage/{$produto->imagem}")); ?>" width="50" height="50" />
                                </td>
                                <td><?php echo e($produto->nome); ?></td>
                                <td><?php echo e($produto->descricao); ?></td>
                                <td><?php echo e($produto->preco); ?></td>
                                <td><?php echo e($produto->nomeProduto); ?></td>
                                <td><?php echo e($produto->nomeCategoria); ?></td>
                                <td><?php echo e($produto->quantidade); ?></td>
                                <td>
                                    <a href="<?php echo e(action('ProdutoController@consultar', $produto->id)); ?>" class="btn-info btn-sm mr-2">
                                        <i class="fas fa-external-link-alt"></i>
                                    </a>
                                    <a href="" class="btn-danger btn-sm" 
                                       onclick="deletar('<?php echo e(action("ProdutoController@deletar", $produto->id)); ?>', 'Produto');">
                                        <i class="fas fa-trash-alt mt-3"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/lista/produto_lista.blade.php ENDPATH**/ ?>