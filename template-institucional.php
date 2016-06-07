<?php /* template name:institucional */ ?>
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
          <div class="row">
            <div class="col-md-4">
              <h1 class="titulo-cursos">Institucional</h1>
              <ul class="menu-lateral">
                <?php
                $args = array(
                  'post_type'     => 'page',
                  'post_parent'   => 60,
                  'orderby'       => 'menu_order',
                  'order'         => 'asc'
                );
                $menu_lateral = new wp_query($args);
                if ($menu_lateral->have_posts()):
                  while($menu_lateral->have_posts()): $menu_lateral->the_post();
                ?>
                  <li><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></li>
                <?php
                  endwhile;
                endif;
                wp_reset_query();
                ?>
              </ul>
            </div>
            <div class="col-md-8">
              <h1 class="titulo-cursos"> <?php the_title() ?> </h1>
              <?php the_content(); ?>
            </div>
          </div>
        </div>
      </section>
    <?php endwhile; ?>
  <?php endif; ?>
<?php get_footer(); ?>
