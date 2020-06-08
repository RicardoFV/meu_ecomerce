

<?php $__env->startSection('conteudo'); ?>

<div class="container">
    <div class="col-sm-2 col-md-3 ml-4 mb-5">
        <a href="<?php echo e(route('home')); ?>" class="btn btn-lg btn-block btn-primary text-uppercase">voltar a comprar</a>
    </div>
    <h2 class="pt-0 text-center">Minhas Pendencias</h2>
    

        <div class="col-sm-12 mb-5">

            <table class="table table-sm table-bordered table-hover">
                <thead class="text-center text-uppercase">
                    <tr>
                        <th scope="col" colspan="6" class=""> Cliente : <?php echo e($itens[0]->nomeCliente); ?> </th>
                    </tr>
                    <tr>
                        <th scope="col">Imagem</th>
                        <th scope="col">Nome do Produto</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($itens)): ?>
                    <?php $__currentLoopData = $itens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <tr class="text-center">
                        <td scope="row"><img src="<?php echo e(url("storage/{$item->imagem}")); ?>" width="50" height="50"></td>
                        <td scope="row"> <?php echo e($item->produtoNome); ?></td>
                        <td scope="row"><?php echo e($item->quantidade); ?></td>
                        <td scope="row">R$ <?php echo e($item->valor); ?></td>
                        <td scope="row"> 
                            <form action="<?php echo e(route('carrinho.deleta_pendente')); ?>" method="post">
                                 <?php echo csrf_field(); ?>
                                 <input type="hidden" name="pedido_id" id="pedido_id" value="<?php echo e($item->pedido_id); ?>"/>
                                 <input type="hidden" name="produto_id" id="produto_id" value="<?php echo e($item->produto_id); ?>"/>
                                <input type="hidden" name="pedido_item" id="pedido_item" value="<?php echo e($item->id); ?>"/>
                                <input type="hidden" name="quantidade_escolhidade" id="quantidade_escolhidade" value="<?php echo e($item->quantidade); ?>"/>
                                <button class="btn btn-sm btn-danger mt-2">Remover</button> 
                            </form>
                                                 
                        </td>
                    </tr>
                     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?>
                     <tr>
                         <td colspan="6">
                             <a href="<?php echo e(route('carrinho.finalizar')); ?>" class="btn btn-success btn-block col-sm-12 mt-2 mb-2">Ir para Finalizar Compra</a>
                         </td>
                     </tr> 
                </tbody>
            </table>
            
        </div>
  
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/venda/pendentes.blade.php ENDPATH**/ ?>