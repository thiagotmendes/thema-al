<?php get_header(); ?>
      <section class="pre-conteudo">
        <div class="container">
          <p id="breadcrumbs"><span xmlns:v="http://rdf.data-vocabulary.org/#">
          <span typeof="v:Breadcrumb"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="v:url" property="v:title">Início</a> /
          <span rel="v:child" typeof="v:Breadcrumb">pós-graduação /
          <span class="breadcrumb_last"><strong><?php the_title() ?></strong></span></span></span></span></p>
        </div>
      </section>
      <section class="conteudo">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <h1 class="titulo-cursos">GRADUAÇÃO</h1>
              <ul class="menu-lateral">
                <?php
                $titulo_comapre = get_the_ID();
                $argumento_cursos = array(
                  'post_type' => 'pos-graduacao',
                  'orderby'   => 'menu_order',
                  'order'     => 'asc'
                );
                $cursos_graduacao = new wp_query($argumento_cursos);
                if ($cursos_graduacao->have_posts()):
                  while ($cursos_graduacao->have_posts()): $cursos_graduacao->the_post();
                    if ($titulo_comapre == get_the_ID()) {
                      $active_lateral = "active";
                    } else {
                      $active_lateral = "";
                    }
                  ?>
                    <li class="<?php echo $active_lateral ?>"><a href="<?php the_permalink() ?>"> <?php the_title() ?> </a></li>
                  <?php
                  endwhile;
                endif;
                ?>
              </ul>
            </div>
            <div class="col-md-9">
              <div class="row">
                <?php
                if (have_posts()):
                  while (have_posts()): the_post();
                  ?>
                  <div class="col-md-8">
                    <h1 class="titulo-cursos"><?php the_title() ?></h1>
                    <?php the_content() ?>
                  </div>
                  <div class="col-md-4">
                    <button type="button" name="button" class="btn btn-matricula btn-lg" data-toggle="modal" data-target="#modal_inscreva">Inscreva-se</button>

                    <div class="modal fade" id="modal_inscreva" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                      <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel"><?php the_title() ?></h4>
                          </div>
                          <div class="modal-body">
                            <?php echo do_shortcode('[contact-form-7 id="83" title="inscreva"]') ?>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="box-infogeral">
                      <div class="infogeral-head">
                        INFORMAÇÕES GERAIS
                      </div>
                      <div class="conteudo-info">
                        <?php
                        $ato      = get_field('ato_de_reconhecimento');
                        $vagas    = get_field('vagas');
                        $turno    = get_field('turno');
                        $horário  = get_field('horário');
                        $duração  = get_field('duração');

                        if (!empty($ato)) {
                          echo "<span>Ato de Reconhecimento</span> <br />";
                          echo $ato;
                          echo "<hr />";
                        }

                        if (!empty($vagas)) {
                          echo "<span>VAGAS: </span>";
                          echo $vagas;
                          echo "<hr />";
                        }

                        if (!empty($turno)) {
                          echo "<span>TURNO: </span>";
                          echo $turno;
                          echo "<hr />";
                        }

                        if (!empty($horário)) {
                          echo "<span>HORARIO: </span>";
                          echo $horário;
                          echo "<hr />";
                        }

                        if (!empty($duração)) {
                          echo "<span>DURAÇÃO: </span>";
                          echo $duração;
                        }
                        ?>
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
