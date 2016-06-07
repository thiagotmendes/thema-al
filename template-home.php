<?php /* template name: Home */ ?>
<?php get_header(); ?>
<main class="home">
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <?php echo do_shortcode('[rev_slider alias="home"]') ?>
        </div>
        <div class="col-md-3">
          <?php query_posts('page_id=126'); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
          <?php endwhile; endif; wp_reset_query(); ?>
          <!--<a href="<?php echo esc_url( home_url( 'cursos-de-extensao' ) ); ?>">
            <img src="<?php echo get_template_directory_uri() ?>/images/bn-matricule.jpg" alt="" />
          </a>-->
        </div>
      </div>
    </div>
  </section>

  <section class="curso-graducao">
    <div class="container">
      <h2 class="titulo-home">Cursos de graduação</h2>
      <div class="row lista-cursos">
        <?php
        $args = array(
          'post_type' => 'cursos',
          'orderby'   => 'menu_order',
          'order'     => 'asc'
        );
        $cursos_graduacao = new wp_query($args);
        if ($cursos_graduacao->have_posts()):
          while($cursos_graduacao->have_posts()): $cursos_graduacao->the_post();
        ?>
        <div class="col-md-3 cursos-graduacao">
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
  </section>

  <section class="pos-graduacao">
    <div class="container">
      <h2 class="titulo-pos-graduacao">CURSOS DE PÓS-GRADUAÇÃO</h2>
      <div class="row lista-cursos">
        <?php
        $args = array(
          'post_type' => 'pos-graduacao',
          'orderby'   => 'menu_order',
          'order'     => 'asc'
        );

        $cursos_graduacao = new wp_query($args);
        if ($cursos_graduacao->have_posts()):
          while($cursos_graduacao->have_posts()): $cursos_graduacao->the_post();
        ?>
        <div class="col-md-4">
          <div class="img-unidade">
            <?php if (has_post_thumbnail()): ?>
              <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
            <?php endif; ?>
            <div class="info">
              <h4><?php the_title() ?></h4>
              <a href="<?php the_permalink() ?>" class="btn btn-faculdade-pos">Saiba Mais</a>
            </div>
          </div>
        </div>
        <?php
          endwhile;
        endif;
        ?>
      </div>
    </div>
  </section>


  <section class="curso-graducao">
    <div class="container">
      <h2 class="titulo-home">Cursos de Extenção</h2>
      <div class="row lista-cursos">
        <?php
        $args = array(
          'post_type' => 'extensao',
          'orderby'   => 'menu_order',
          'order'     => 'asc'
        );

        $cursos_graduacao = new wp_query($args);
        if ($cursos_graduacao->have_posts()):
          while($cursos_graduacao->have_posts()): $cursos_graduacao->the_post();
        ?>
        <div class="col-md-3 cursos-graduacao">
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
      <p align="center">
        <a href="#" class="btn btn-faculdade">Ver Todos</a>
      </p>
    </div>
  </section>

  <section class="mec">
    <div class="container">
      <a href="<?php echo esc_url( home_url( 'cursos-graduacao' ) ); ?>">
        <img src="<?php echo get_template_directory_uri() ?>/images/mec.jpg" alt="" class="img-responsive" />
      </a>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h3 class="titulo-postagens">Depoimentos</h3>
          <div class="depoimentos">
            <?php
            $arg_depoimento = array(
              'post_type'       => 'depoimentos',
              'posts_per_page'  => 6
            );

            $depoimento_home = new WP_Query( $arg_depoimento );
  					if($depoimento_home->have_posts()):
  						while ( $depoimento_home->have_posts() ) { $depoimento_home->the_post();
              ?>
                <div>
                  <div class="depoimento_box">
                    <div class="conteudo_depo">
                      <?php the_content(); ?>
                    </div>
                  </div>
                  <div class="author-depo">
                    <?php the_post_thumbnail( 'high', array( 'class' => '' ) ); ?>
                    <span class="depo-name"><?php the_title(); ?></span>
                  </div>
                </div>
              <?php
              }
            endif;
            ?>
          </div>
        </div>
        <div class="col-md-4">
          <h3 class="titulo-postagens">Últimas Postagens</h3>
          <?php
					$arg_programacao = array (
            'post_type'			=> 'post',
            'posts_per_page' 	=> 4
					);
					$programacao_home = new WP_Query( $arg_programacao );
					if($programacao_home->have_posts()){
						while ( $programacao_home->have_posts() ) { $programacao_home->the_post();
				?>
        <div class="row lista-noticias">
          <div class="col-md-4">
						<div class="img-post-home">
							<?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
						</div>
          </div>
          <div class="col-md-8">
						<h4 class="titulo-noticia-home"><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a></h4>
						<i><?php the_time('j  F,  Y'); ?></i>
					</div>
        </div>

				<?php
						}
					}
				?>
        </div>
        <div class="col-md-4">

          <div class="patrimonio" onclick="location.href='http://alfa.fourmedia.com.br/patrimonio-historico-cultural-e-educacional/'">
            <div class="col-md-4">
              <img src="<?php echo get_template_directory_uri() ?>/images/patrimoniohistorico.jpg" alt="" class="img-responsive" />
            </div>
            <div class="col-md-8">
              <h4>GRUPO DE PESQUISA:</h4>
              Patrimônio histórico
            </div>
            <div class="clearfix"></div>
          </div>

          <div class=" patrimonio" onclick="location.href='http://alfa.fourmedia.com.br/informacao-e-sensibilizacao-para-construcao-de-conhecimento/'">
            <div class="col-md-4">
              <img src="<?php echo get_template_directory_uri() ?>/images/educacaoambiental.jpg" alt="" class="img-responsive" />
            </div>
            <div class="col-md-8">
              <h4>GRUPO DE PESQUISA:</h4>
              Patrimônio histórico
            </div>
            <div class="clearfix"></div>
          </div>

          <div class=" patrimonio">
            <div class="col-md-4">
              <img src="<?php echo get_template_directory_uri() ?>/images/biblioteca.jpg" alt="" class="img-responsive" />
            </div>
            <div class="col-md-8">
              <h4>GRUPO DE PESQUISA:</h4>
              Patrimônio histórico
            </div>
            <div class="clearfix"></div>
          </div>

        </div>
      </div>
    </div>
  </section>

  <section class="contato-home">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <h4 class="titulo-postagens text-center">Localização</h4>
          <iframe style="border: 0;"
          src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7288.909157659619!2d-46.449713!3d-24.01503!3m2!1i1024!2i768!4f13.1!3m3!1m2!1
          s0x94ce1e886f6e714f%3A0xdc10ae9657413cc5!2sAv.+Pres.+Kennedy%2C+4285+-+Vila+Cai%C3%A7ara%2C+Praia+Grande+-
          +SP%2C+Brasil!5e0!3m2!1spt-BR!2sbr!4v1464617011484"
          width="100%" height="450" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
        </div>
        <div class="col-md-6">
          <h4 class="titulo-postagens text-center">Fale Conosco</h4>
          <div class="box-contato">
            <?php echo do_shortcode('[contact-form-7 id="78" title="Formulário de contato 1"]') ?>
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="parceiros-home">
    <div class="container">
      <h3 class="titulo-postagens text-center">Parceiros</h3>

    </div>
  </section>
</main>

<?php get_footer(); ?>
