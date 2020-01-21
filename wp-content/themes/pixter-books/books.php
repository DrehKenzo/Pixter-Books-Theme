<!--?php /* Template name: Books */ ?-->

<?php 
$cssEspecifico = 'page';
require_once('header.php');
?>

<main class="container large-ctn">
  <section class="listagem-com-filtro blankspace">
    <div class="row">
      <aside class="col filtro col-mobile-12">
        <h2 class="text-white">Filtro</h2>
        <form action="" class="form_filter">
          <input type="text" name="palavra-passe" id="form-palavra" placeholder="Palavra-passe">
          <input type="text" name="titulo" id="form-titulo" placeholder="Título">
          <input type="text" name="categoria" id="form-categoria" placeholder="Categoria">
          <input type="text" name="ano" id="form-ano" placeholder="Ano">
          <input type="text" name="autor" id="form-autor" placeholder="Autor">
          <input type="text" name="categoria" id="form-categoria" placeholder="Categoria">
          <button type="submit">Buscar</button>
        </form>
      </aside>
      <div class="col-8 col-mobile-12">
        <?php get_template_part('template-parts/books'); ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>