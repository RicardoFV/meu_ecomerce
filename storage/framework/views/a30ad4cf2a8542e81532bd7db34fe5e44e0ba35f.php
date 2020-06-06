<?php $__env->startSection('conteudo'); ?>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produto</th>
                            <th scope="col">Em estoque</th>
                            <th scope="col" class="text-center">Quantidade</th>
                            <th scope="col" class="text-right">Preço</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php 
                            $total = 0;
                            $quantidade =0;
                            Session::put('carrinho', 0);
                        ?>
                        <?php $__currentLoopData = $carrinhoItens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $carrinho): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td><img src="<?php echo e(url("storage/{$carrinho->imagem}")); ?>" width="70" height="70" /> </td>
                            <td><?php echo e($carrinho->produtoNome); ?> </td>
                            <td><?php echo e($carrinho->produtoQuantidade); ?></td>
                            <form action="<?php echo e(route('carrinho.atualizar')); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="produto_id" id="produto_id" value="<?php echo e($carrinho->produto_id); ?>"/>
                                <input type="hidden" name="item_pedido" id="item_pedido" value="<?php echo e($carrinho->id); ?>"/>
                                <td><input class="form-control text-center" value="<?php echo e($carrinho->quantidade); ?>" type="text" id="quantidade" name="quantidade" /></td>
                            </form>
                                <td class="text-right">R$ <?php echo e($carrinho->valor); ?></td>
                            <form action="<?php echo e(route('carrinho.deletar')); ?>" method="post">
                                 <?php echo csrf_field(); ?>
                                 <input type="hidden" name="produto_id" id="produto_id" value="<?php echo e($carrinho->produto_id); ?>"/>
                                <input type="hidden" name="pedido_item" id="pedido_item" value="<?php echo e($carrinho->id); ?>"/>
                                <input type="hidden" name="quantidade_escolhidade" id="quantidade_escolhidade" value="<?php echo e($carrinho->quantidade); ?>"/>
                                <td class="text-right"><button class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> </button> </td>
                            </form> 
                        </tr>
                        <?php
                            $total += $carrinho->valor ;
                            $quantidade ++;
                            Session::put('carrinho', $quantidade);
                        ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><strong>Total</strong></td>
                        <td class="text-right"><strong>RS <?php echo e(number_format($total,2,',','.' )); ?></strong></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-lg btn-block btn-primary text-uppercase">voltar a comprar</a>
                </div>
                <?php if($quantidade > 0): ?>
                    <div class="col-sm-12 col-md-6 text-right">
                        <a href="<?php echo e(route('carrinho.finalizar')); ?>" class="btn btn-lg btn-block btn-success text-uppercase">Finalizar Compra</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/venda/carrinho.blade.php ENDPATH**/ ?>