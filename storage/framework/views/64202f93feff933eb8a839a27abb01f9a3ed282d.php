
<!-- onde e colocado o conteudo -->
 
       
         
        
         <!-- conteudo principal -->
        <?php echo $__env->yieldContent('conteudo'); ?>
        
        <!-- inclusão do rodapé -->
       <?php echo $__env->make('footer.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Projetos\laravel\meu_estoque\resources\views/tela_principal.blade.php ENDPATH**/ ?>