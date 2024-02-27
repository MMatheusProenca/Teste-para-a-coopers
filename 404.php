
<!-- FUNÇÃO PRÓPRIA DO WORDPRESS QUE PEGA O ARQUIVO "header.php" E PUXA TUDO DELE -->
<?php get_header() ?>
<!-- LIMPA O HEADER NA PÁGINA DE ERRO -->
<?php if(is_404()){?>
   <style>
      header{
         display: none;
      }
   </style>
<?php }?>
<main class="erro_404">
   <div class="center">
      <h1>Oops!</h1>
      <h2>Essa página não foi encontradada.</h2>
      <a href="/">Voltar para página home</a>
   </div> <!-- DIV CENTER -->
</main> <!-- MAIN -->

<!-- FUNÇÃO PRÓPRIA DO WORDPRESS QUE PEGA O ARQUIVO "footer.php" E PUXA TUDO DELE -->
<?php get_footer() ?>