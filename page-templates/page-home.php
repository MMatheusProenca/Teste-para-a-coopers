<?php
//Template Name: Home
?>

<?php
// PARA FACILITAR AS TROCAS DE CORES E CLASSES, AQUI ESTÃO VARIÁVEIS DE ACORDO COM OS INPUTS DO WORDPRESS
$cor_texto_botao_chamada = 'color: ' . get_field('cor_texto_botao_chamada');
$cor_botao_chamada = 'background-color: ' . get_field('cor_botao_chamada');
$cor_destaque_chamada = 'color: ' . get_field('cor_destaque_chamada');
$cor_destaque_introducao = 'border-color: ' . get_field('cor_destaque_introducao');
?>

<style>
   /*** AQUI ESTÃO CLASSES QUE SERÃO ALTERADAS TAMBÉM DE ACORDO COM OS INPUTS DO WORDPRESS ***/
   :root {
      --font-style-1: '<?php the_field('font_padrao'); ?>' !important;
      --font-style-2: '<?php the_field('fonte_secundaria'); ?>' !important;
   }

   .form .icon_form::before {
      background-image: url("<?php the_field('icone_destaque_form'); ?>") !important;
   }

   section.contact .center .form_details span {
      background-color: <?php the_field('cor_destaque_topo_form'); ?> !important;
   }

   label {
      color: <?php the_field('cor_label_form'); ?> !important;
   }

   input,
   textarea {
      color: <?php the_field('cor_placeholder_form'); ?> !important;
      background-color: <?php the_field('cor_dos_inputs'); ?> !important;
   }

   input::placeholder,
   textarea::placeholder {
      color: <?php the_field('cor_placeholder_form'); ?> !important;
   }

   input[type="submit"] {
      color: <?php the_field('cor_texto_botao_envio'); ?> !important;
      background-color: <?php the_field('cor_botao_form'); ?> !important;
   }

   section.about_slides .slides_container .slides .slide .details span {
      color: <?php the_field('cor_texto_slide'); ?>;
      border-color: <?php the_field('cor_texto_slide'); ?>;
   }

   section.about_slides .slides_container .slides .slide p {
      color: <?php the_field('cor_texto_slide'); ?> !important;
   }
</style>

<!-- FUNÇÃO PRÓPRIA DO WORDPRESS QUE PEGA O ARQUIVO "header.php" E PUXA TUDO DELE -->
<?php get_header() ?>

<main style="<?php if (get_field('header_fixo') == 'Sim') { ?>
   margin-top: 160px 
   <?php } ?>"><!-- CONTAINER DE TODO O CONTEÚDO PRINCIPAL -->

   <section class="top_site"><!-- SEÇÃO TOPO -->
      <div class="center flex_center"><!-- DIV CENTER -->
         <div class="text_content"><!-- CONTAINER DO TEXTO -->
            <h1><?php the_field('chamada_principal') ?><span style="<?php echo $cor_destaque_chamada; ?>"> <?php the_field('destaque_chamada') ?></span></h1>
            <p><?php the_field('chamada_secundaria') ?></p>
            <a class="to-do_a" href="#to-do" role="button"><?php the_field('texto_botao_chamada') ?></a>
         </div><!-- FIM CONTAINER DO TEXTO -->
         <img src="<?php the_field('imagem_lateral_chamada') ?>" alt="<?php the_field('alt_imagem_lateral') ?>"><!-- CONTAINER DA IMAGEM -->
         <div class="<?php echo get_field('desabilitar_formas_pelo_site') ? 'none' : '' ?> image_content"><!-- FIM CONTAINER DA IMAGEM -->
         </div>
      </div><!-- FIM DIV CENTER -->
   </section><!-- FIM SEÇÃO TOPO -->

   <div class="arrow_down flex_center"><!-- DIV SETA SCROLL -->
      <img src="<?php the_field('seta_rolagem') ?>" alt="Seta de scroll para baixo">
   </div><!-- FIM DIV SETA SCROLL -->

   <section id="to-do" class="banner_container"><!-- SEÇÃO DO BANNER DE INTRODUÇÃO -->
      <div class="center flex_column_center"><!-- DIV CENTER -->
         <h2 style="<?php echo $cor_destaque_introducao; ?>"><?php the_field('titulo_introducao') ?></h2>
         <p><?php the_field('descricao_informacao') ?></p>
      </div><!-- FIM DIV CENTER -->
   </section><!-- FIM SEÇÃO DO BANNER DE INTRODUÇÃO -->

   <section class="planos"><!-- SEÇÃO DOS PLANOS -->
      <div class="center flex_center"><!-- DIV CENTER -->
         <?php
         // VERIFICA SE TEM LINHA DO REPEATER DE PLANO NO WORDPRESS
         while (have_rows('plano')) {
            //CASO TENHA LINHA, ANALIZA CADA UMA PARA RETORNAR AS INFORMAÇÕES
            the_row();
            // PEGA O CAMPO DE OCORRÊNCIA, PARA ESCREVER DO JEITO CERTO, "Mês" OU "Ano"
            $ocorrencia = get_sub_field('ocorrencia_plano');
            $ocorrencia_plano = $ocorrencia == 'Mensal' ? 'Mês' : 'Ano';
         ?>
            <div style="border-color: <?php the_sub_field('cor_detalhe_acima') ?>;" class="plano flex_column_center"><!-- CONTAINER DOS PLANOS -->
               <div class="details"><!-- DETALHES DO PLANO -->
                  <h2><?php the_sub_field('preco_plano'); ?> / <?php echo $ocorrencia_plano ?></h2>
                  <h3><?php the_sub_field('tipo_plano'); ?></h3>
                  <h3><?php the_sub_field('descricao_plano'); ?></h3>
               </div><!-- FIM DETALHES DO PLANO -->
               <ul><!-- LISTA DE ITENS INCLUÍDOS -->
                  <?php
                  // VERIFICA SE TEM LINHA DO REPEATER DE INCLUSO NO PLANO NO WORDPRESS
                  while (have_rows('incluso_no_plano')) {
                     //CASO TENHA LINHA, ANALIZA CADA UMA PARA RETORNAR AS INFORMAÇÕES
                     the_row();
                  ?>
                     <li class="<?php the_sub_field('incluido_no_plano'); ?>"><?php the_sub_field('iten_incluido'); ?></li>
                  <?php } ?>
               </ul><!-- FIM LISTA DE ITENS INCLUÍDOS -->
               <a class="plano_a" style="background-color: <?php the_sub_field('cor_botao'); ?>; color: <?php the_sub_field('cor_texto_botao'); ?>" href="#contact" role="button"><?php the_sub_field('texto_botao'); ?></a>
            </div><!-- FIM CONTAINER DOS PLANOS -->
         <?php } ?>
      </div><!-- FIM DIV CENTER -->
      <div class="<?php echo get_field('desabilitar_formas_pelo_site') ? 'none' : '' ?> detail_planos"></div>
   </section><!-- FIM SEÇÃO DOS PLANOS -->

   <section class="about_slides"><!-- SECÃO DE SLIDES -->
      <div class="slides_container"><!-- DIV CENTER -->
         <h2><?php the_field('titulo_slide') ?></h2>
         <div class="slides"><!-- CONTAINER DOS SLIDES -->
            <?php
            // VERIFICA SE TEM LINHA DO REPEATER DE SLIDES NO WORDPRESS
            while (have_rows('slides')) {
               //CASO TENHA LINHA, ANALIZA CADA UMA PARA RETORNAR AS INFORMAÇÕES
               the_row();
            ?>
               <div class="slide"><!-- SLIDE -->
                  <div class="image_container">
                     <img src="<?php the_sub_field('imagem_principal') ?>" alt="imagem do topo do slide">
                     <span class="arrow"> <img src="<?php the_field('icone_destaque') ?>" alt="Icone decorativo do slide"></span>
                  </div>
                  <div style="background-color: <?php the_field('cor_fundo_slide') ?>" class="details flex_column">
                     <span><?php the_sub_field('tag_destaque'); ?></span>
                     <p><?php the_sub_field('descricao'); ?></p>
                     <a style="color: <?php the_field('cor_link_slide'); ?>" role="button" href="#"><?php the_field('texto_link'); ?></a>
                  </div>
               </div><!-- FIM SLIDE -->
            <?php } ?>
         </div><!-- FIM CONTAINER DOS SLIDES -->
      </div><!-- FIM DIV CENTER -->
   </section><!-- FIM SECÃO DE SLIDES -->

   <section id="contact" class="contact"><!-- SECÃO DE CONTATO -->
      <div class="center flex_column_center"><!-- DIV CENTER -->
         <div class="form_details"><!-- DETALHES DO FORM -->
            <span class="<?php echo get_field('desabilitar_formas_pelo_site') ? 'none' : '' ?>"></span>
            <img src="<?php the_field('imagem_topo_form'); ?>" alt="imagem de ilustração para o formulário de contato">
         </div><!-- FIM DETALHES DO FORM -->
         <div style="background-color: <?php the_field('cor_fundo_form'); ?>" class="form flex_column_center"><!-- FORM DE CONTATO -->
            <span><!-- DETALHES -->
               <span class="icon_form"></span>
               <h2 style="color: <?php the_field('cor_da_chamada'); ?> !important;"><?php the_field('chamada_formulario'); ?></h2>
            </span><!-- FIM DETALHES -->
            <?php
            // PUXA O CONTEÚDO DA PÁGINA DO WORDPRESS, ONDE EXISTE OS CAMPOS DE FORMULÁRIO, CRIADOS PELO CONTACT FORM 7
            the_content()
            ?>
         </div><!-- FIM FORM DE CONTATO -->
      </div>
   </section><!-- FIM SECÃO DE CONTATO -->

</main><!-- FIM CONTAINER DE TODO O CONTEÚDO PRINCIPAL -->

<!-- FUNÇÃO PRÓPRIA DO WORDPRESS QUE PEGA O ARQUIVO "footer.php" E PUXA TUDO DELE -->
<?php get_footer() ?>