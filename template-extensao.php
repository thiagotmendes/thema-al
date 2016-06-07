<?php /* template name: pagina extensao */ ?>
<?php get_header(); ?>
      <section class="pre-conteudo">
        <div class="container">
          <?php if ( function_exists('yoast_breadcrumb') )
                {yoast_breadcrumb('<p id="breadcrumbs">','</p>');} ?>
        </div>
      </section>
      <section class="conteudo">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <h1 class="titulo-cursos">GRADUAÇÃO</h1>
              <ul class="menu-lateral">
                <?php
                $terms = get_terms( 'categoria-extensao', array(
                    'hide_empty' => false,
                ) );
                foreach ($terms as $term) {
                  $term_link = get_term_link( $term );
                ?>
                  <li><a href="<?php echo esc_url( $term_link ) ?>"> <?php echo $term->name ?> </a></li>
                <?php
                }
                ?>
              </ul>
            </div>
            <div class="col-md-9">
              <h1 class="titulo-cursos"> Atendimento Educacional Especializado </h1>
              <div class="row">
                <?php
                $argumento_cursos = array(
                  'post_type' => 'extensao',
                  'orderby'   => 'menu_order',
                  'order'     => 'asc'
                );
                $cursos_graduacao = new wp_query($argumento_cursos);
                if ($cursos_graduacao->have_posts()):
                  while ($cursos_graduacao->have_posts()): $cursos_graduacao->the_post();
                  ?>
                    <div class="col-md-4 cursos-graduacao">
                      <div class="hover ehover4">
                        <?php if (has_post_thumbnail()): ?>
                          <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
                        <?php endif; ?>
                        <div class="overlay">
            							<h2><?php the_title() ?></h2>
            							<button class="info" onclick="location.href='<?php the_permalink() ?>'">Saiba mais</button>
                        </div>
                      </div>
                    </div>
                  <?php
                  endwhile;
                endif;
                ?>
              </div>
            </div>
          </div>
        </div>
      </section>
<?php get_footer(); ?>
