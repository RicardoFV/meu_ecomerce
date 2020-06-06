

<?php $__env->startSection('content'); ?>

<div class="container">
    <!-- colocando a mensagem de erro -->
    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
    <?php endif; ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Alterar Produto</div>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post" action="<?php echo e(action('ProdutoController@atualizar', $produto->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="form-row">

                            <!-- campo responsavel por dizer que o cadastro esta ativo ou não -->
                            <input type="hidden" id="ativo" name="ativo" value="<?php echo e($produto->ativo); ?>">
                            <!-- pega o usuario logado -->
                            <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo e(Auth::user()->id); ?>"> 
                            <div class="col-3">
                                <label for="nome">NOME:</label>
                                <input type="text" class="form-control" value="<?php echo e($produto->nome); ?>" id="nome" name="nome" placeholder="Nome">
                            </div>
                            <div class="col-3">
                                <label for="parceiro_id">PARCEIRO:</label>

                                <select name="parceiro_id" id="parceiro_id" class="form-control">
                                    <option value="">Selecione</option>
                                    <?php $__currentLoopData = $parceiros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parceiro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($parceiro->id); ?>" <?= ($produto->parceiro_id == $parceiro->id) ? 'selected' : '' ?> ><?php echo e($parceiro->nome); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>
                            <div class="col-auto">
                                <label for="cep">QUANTIDADE:</label>
                                <input type="text" class="form-control" value="<?php echo e($produto->quantidade); ?>" id="quantidade" name="quantidade" placeholder="Quantidade">
                            </div>

                            <div class="col-3">
                                <label for="preco">PREÇO:</label>
                                <input type="text" class="form-control" id="preco" value="<?php echo e($produto->preco); ?>" name="preco" placeholder="Preço">
                            </div>
                            <div class="col-3">
                                <label for="descricao">DESCRIÇÃO:</label>
                                <textarea name="descricao"  id="descricao" wrap="hard" class="form-control" cols="25" rows="3" placeholder="Digite a descrição do Produto">
                    <?php echo e($produto->descricao); ?>

                                </textarea>

                            </div>
                            <div class="col-3">
                                <label for="parceiro_id">CATEGORIA:</label>

                                <select name="categoria_id" id="categoria_id" class="form-control">
                                    <option value="">Selecione</option>
                                    <?php $__currentLoopData = $categorias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categoria): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($categoria->id); ?>" <?= ($produto->categoria_id == $categoria->id) ? 'selected' : '' ?> ><?php echo e($categoria->nome); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                            </div>

                            <div class="col-auto">
                                <label for="imagem"  class="">IMAGEM:</label>
                                <input type="file" id="imagem"  name="imagem" class="form-control-file">
                                <!-- atributo colocado para que não perca a referencia -->
                                <input type="hidden" name="sem_imagem" value="<?php echo e($produto->imagem); ?>">
                            </div>

                        </div>


                        <button class="btn btn-success btn-block mt-3">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_ecomerce\resources\views/altera/produto_altera.blade.php ENDPATH**/ ?>