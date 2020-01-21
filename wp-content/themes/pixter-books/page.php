<?php 
    $cssEspecifico = 'page';
    require_once('header.php');
?>

<?php 
if(have_posts()) :
while( have_posts()) : the_post(); ?>
    <main class="container medium-ctn">
    <?php if (!is_page('newsletter') ): ?>
        <section class="pagina fullspace">
            <div class="pagina-conteudo">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </section>
    <?php endif; ?>
    </main>
<?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>