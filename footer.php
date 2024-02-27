<footer class="flex_center">
   <div class="center flex_column_center">
      <h2><?php the_field('titulo_footer') ?></h2>
      <h3><a href="mailto:<?php the_field('email_contato') ?>" target="_blank"><?php the_field('email_contato') ?></a></h3>
      <h3><?php the_field('rodape') ?></h3>
      <img class="<?php echo get_field('desabilitar_formas_pelo_site') ? 'none' : '' ?>" src="<?php echo get_theme_root_uri() ?>/coopers/assets/img/footer-detail.svg" alt="Detalhe verde do footer">
   </div><!-- DIV CENTER -->
</footer><!-- FOOTER -->

<!-- IMPORTACAO PRÓPRIA DO WORDPRESS -->
<?php wp_footer() ?>
<!-- IMPORTACAO DOS SCRIPTS COMO JQUERY, SLICK SLIDER ETC... -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="<?php echo get_theme_root_uri() ?>/coopers/assets/scripts min/script.js"></script>
</body>

</html>