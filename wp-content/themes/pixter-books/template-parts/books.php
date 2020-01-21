<div class="row">
  <?php 
  $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
  $loop = new WP_Query(array( 
    'post_type'     => 'livros', 
    'status'        => 'published', 
    'posts_per_page'=> 8,
    'orderby'	      => 'post_date',
    'order'         => 'DESC',
    'paged'         => $paged
  ));

  if($loop->have_posts()) : ?>
    <?php while($loop->have_posts()) : $loop->the_post(); ?>
      <div class="livros-item col-3 col-mobile-6">
        <a class="livrolink" href="<?php the_permalink(); ?>" >
          <?php the_post_thumbnail(); ?>
        </a>
        <!-- <h2><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></h2> -->
        <!-- <div><?php the_content(); ?></div> -->
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
  <?php 
  if($loop->post_count < 8){ ?>
      <div class="load-more col-12"&gta class="btn secondary-button">Não há mais livros</a></div>
  <?php }else{ ?>
      <div id="livros-loader col-12" class="loading-banner"><button onclick="loadmore()" class="btn-loadmore">Carregar Mais</button></div>
  <?php } ?>
</div>