<!DOCTYPE html>
<html class="no-js" lang="pt-br">

<?php
// VERIFICA O TITULO DA PAGINA PARA POR NA TAG TITLE
if (get_the_title() == '') {
   $title = 'Erro '; // SE VIER VAZIO, COLOCA Erro
} else {
   $title = get_the_title();  // SENÃO COLOCA O NOME QUE VEM
}
?>

<head>
   <script>
      // Adiciona uma classe "no-js" ao elemento <html>
      document.documentElement.classList.remove("no-js");
   </script>
   <!-- IMPORTACAO PRÓPRIA DO WORDPRESS -->
   <?php wp_head() ?>
   <!-- META TAGS -->
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="Site de teste de Front-End, para a empresa Coopers">
   <!-- LINK DE CONEXAO COM O GOOGLE FONTS -->
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <!-- IMPORTAÇÃO DAS FONTS PRINCIPAIS, MONTSERRAT E POPPINS -->
   <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
   <!-- LINK DA ESTILIZAÇÃO DO SLICK SLIDER -->
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
   <!-- LINK DOS CSSs PRÓPRIOS -->
   <link rel="stylesheet" href="<?php echo get_theme_root_uri() ?>/coopers/assets/styles min/root.css">
   <link rel="stylesheet" href="<?php echo get_theme_root_uri() ?>/coopers/assets/styles min/header.css">
   <link rel="stylesheet" href="<?php echo get_theme_root_uri() ?>/coopers/assets/styles min/footer.css">
   <link rel="stylesheet" href="<?php echo get_theme_root_uri() ?>/coopers/assets/styles min/page-home.css">
   <!-- VERIFICA SE A PÁGINA É A DE ERRO, SE FOR, CARREGA A ESTILIZAÇÃO DA PÁGINA -->
   <?php if (is_404()) { ?>
      <link rel="stylesheet" href="<?php echo get_theme_root_uri() ?>/coopers/assets/styles min/page-404.css">
   <?php } ?>
   <title><?php echo $title ?></title>
</head>

<body>
   <header style="
   <?php if (get_field('cor_header')) { ?>
      background-color: <?php the_field('cor_header') ?> ;
   <?php } ?> 

   <?php if (get_field('header_fixo') == 'Sim') { ?>
   position: fixed; width: 100%;height: 120px; z-index: 10;box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
   <?php } ?>
   "><!-- VERIFICA SE, OS CAMPOS DE COR DO HEADER E HEADER FIXO FORAM PREENCHIDOS, ESTILIZA O HEADER COM OS DETERMINADOS ESTILOS-->
      <div class="center flex_center">
         <a href="/"><img src="<?php the_field('logo_header'); ?>" alt="<?php the_field('alt_do_logo'); ?>" role="img"></a>
      </div><!-- DIV CENTER -->
   </header><!-- HEADER -->