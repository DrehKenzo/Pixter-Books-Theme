<?php 
$cssEspecifico = 'page';
require_once('header.php');
global $wp_query;
?>

<div class="banner">
  <?php echo do_shortcode('[rev_slider alias="banner-home"][/rev_slider]');?>
</div>

<main class="container medium-ctn">
  <section class="listagem-de-livros blankspace">
    <div class="subtitulo-pagina">
      <h2 class="align-items-center">Books</h2>
      <p class="align-items-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent vitae eros eget tellus tristique bibendum. Donec rutrum sed sem quis venenatis.</p>
    </div>
    <?php get_template_part('template-parts/books'); ?>
  </section>
</main>

<?php get_footer(); ?>
