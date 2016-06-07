<?php get_header(); ?>
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
      <section class="pre-conteudo">
        <div class="container">
          <h1><?php the_title(); ?></h1>
        </div>
      </section>
      <section class="conteudo">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <ul class="menu-lateral">
                <?php
                $terms = get_terms( 'categoria-cursos');
                foreach ($terms as $term) {
                  echo "<li>";
                    echo "<a
                     href='".esc_url( get_term_link( $term ) )."'>".$term->name."</a>";
                  echo "</li>";
                }
                ?>
              </ul>
            </div>
            <div class="col-md-9">
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>
<?php get_footer(); ?>
