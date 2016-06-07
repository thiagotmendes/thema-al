<?php get_header(); ?>
    <main>
      <section class="pre-conteudo">
        <div class="container">
          <h1>Blog</h1>
        </div>
      </section>

      <section class="blog">
        <div class="container">
          <div class="row">
            <div class="col-md-9">
            <?php
            if (have_posts()):
              while (have_posts()): the_post();
            ?>
              <article class="blog-post">
                <div class="row">
                  <div class="col-md-5">
                    <?php if (has_post_thumbnail()): ?>
    									<div class="img-noticia">
    										<a href="<?php the_permalink(); ?>">  <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?></a>
    									</div>
    								<?php endif ?>
                  </div>
                  <div class="col-md-7">
                    <div class="info-noticia"> <i class="fa fa-clock-o" aria-hidden="true"></i> <?php the_time('j \d\e F \d\e Y') ?> | <strong>Categoria:</strong> <?php the_category(', ') ?>. </div>
                    <h2 class="titulo-noticia"><?php the_title() ?></h2>
                    <p>
                      <?php the_excerpt_limit(30) ?>
                    </p>
                    <a href="<?php the_permalink() ?>" class="btn btn-info">Saiba Mais</a>
                  </div>
                </div>
              </article>
            <?php
              endwhile;
            endif;
            ?>
            </div>
            <div class="col-md-3">
              <?php get_sidebar(); ?>
            </div>
          </div>
        </div>
      </section>

    </main>
<?php get_footer() ?>
