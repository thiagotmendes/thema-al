<?php get_header(); ?>
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
      <section class="pre-conteudo">
        <div class="container">
          <?php if ( function_exists('yoast_breadcrumb') )
                {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        </div>
      </section>
      <section class="conteudo">
        <div class="container">
          <h1 class="titulo-cursos"> <?php the_title() ?> </h1>
          <?php the_content(); ?>
        </div>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>
<?php get_footer(); ?>
