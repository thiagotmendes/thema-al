<?php get_header(); ?>
      <section class="pre-conteudo">
        <div class="container">
          <p id="breadcrumbs"><span xmlns:v="http://rdf.data-vocabulary.org/#">
          <span typeof="v:Breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="v:url" property="v:title">Início</a> /
          <span rel="v:child" typeof="v:Breadcrumb"><a href="<?php echo esc_url( home_url( 'categoria-extensao' ) ); ?>" rel="v:url" property="v:title">Cursos Extensão</a> /
          <span class="breadcrumb_last">Educação</span></span></span></span></p>
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
                $endereco = $_SERVER ['REQUEST_URI'];
      					$endereco = explode('/',$endereco);
                $argumento_cursos = array (
                  'post_type' 		  =>	'extensao',
                  'taxonomy'			  =>	'categoria-extensao',
                  'term'					  =>	$endereco[2],
                  'posts_per_page'  => 40
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
            							<button class="info" onclick="location.href='<?php the_permalink() ?>'">Show code</button>
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
