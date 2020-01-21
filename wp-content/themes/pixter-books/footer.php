<?php $homeDir = get_template_directory_uri(); ?>
<footer>
  <section class="grid-foo">
    <div class="foo-newsletter">
      <?php get_template_part('template-parts/news'); ?>
    </div>
    <div class="foo-social">
      <div class="social-bar">
        <a href="#"><img src="<?= $homeDir; ?>/assets/imgs/facebook.png" title="facebook" alt="facebook"></a>
        <a href="#"><img src="<?= $homeDir; ?>/assets/imgs/twitter.png" title="twitter" alt="twitter"></a>
        <a href="#"><img src="<?= $homeDir; ?>/assets/imgs/googleplus.png" title="googleplus" alt="googleplus"></a>
        <a href="#"><img src="<?= $homeDir; ?>/assets/imgs/pinterest.png" title="pinterest" alt="pinterest"></a>
      </div>
    </div>
    <div class="foo-info row">
      <div class="col-md-15 mb-100">
        <?php dynamic_sidebar('informacao-01'); ?>
      </div>
      <div class="col-md-15 mb-100">
        <?php dynamic_sidebar('informacao-02'); ?>
      </div>
      <div class="col-md-15 mb-100">
        <?php dynamic_sidebar('informacao-03'); ?>
      </div>
      <div class="col-md-15 mb-100">
        <?php dynamic_sidebar('informacao-04'); ?>
      </div>
      <div class="col-md-15 mb-100">
        <?php dynamic_sidebar('informacao-05'); ?>
      </div>
    </div>
  </section>
</footer>
<script src="<?= $homeDir; ?>/assets/js/jquery.min.js"></script>
<script src="<?= $homeDir; ?>/assets/js/jquery.mask.min.js" type="text/javascript"></script>
<script src="<?= $homeDir; ?>/assets/js/owl.carousel.min.js"></script>
<script src="<?= $homeDir; ?>/assets/js/main.js"></script>
<?php wp_footer(); ?>
</body>
</html>