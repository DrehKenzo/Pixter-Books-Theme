<?php 
    $cssEspecifico = 'single';
    require_once('header.php');
?>

<main class="container large-ctn">
  <section class="single-de-livros fullspace">
    <div class="row">
      <?php 
        if(have_posts()) : ?>
          <?php while(have_posts()) : the_post(); ?>

            <div class="col col-mobile-12">
                <div class="box-thumbnail">
                  <?php the_post_thumbnail(); ?>
                </div>
                <div class="box-share">
                  <div class="align-social">
                    <a href="#"><img src="<?= $homeDir; ?>/assets/imgs/min-face.png" title="facebook" alt="facebook"></a>
                    <a href="#"><img src="<?= $homeDir; ?>/assets/imgs/min-twi.png" title="twitter" alt="twitter"></a>
                    <a href="#"><img src="<?= $homeDir; ?>/assets/imgs/min-goo.png" title="googleplus" alt="googleplus"></a>
                    <a href="#"><img src="<?= $homeDir; ?>/assets/imgs/min-pin.png" title="pinterest" alt="pinterest"></a>
                  </div>
                </div>
            </div>

            <div class="col-8 col-mobile-12">

              <div class="livro-descrição">
                <div class="box-info">
                  <h2><?php the_title(); ?></h2>
                  <img src="<?= $homeDir; ?>/assets/imgs/rating.png" title="rating" alt="rating">
                </div>
                <p><?php the_content(); ?></p>
              </div>

              <div class="livro-categoria">
                <span><?php the_category() ?></span>
              </div>

              <div class="botoes-single-livros">
                <a class="comprar" href="#" target="_blank" rel="noopener noreferrer">Comprar</a>
                <a class="lista-de-desejos" href="#" target="_blank" rel="noopener noreferrer">Lista de Desejos</a>
              </div>
            </div>
          <?php endwhile; ?>
        <?php endif; ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>