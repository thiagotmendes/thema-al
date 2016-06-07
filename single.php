<?php get_header(  ); ?>
	<main class="noticia">
		<section class="pre-conteudo">
      <div class="container">
        <h1>Blog</h1>
      </div>
    </section>

		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?php if (have_posts()): ?>
						<?php while(have_posts()): the_post(); ?>
							<article class="block_noticia">
								<?php if (has_post_thumbnail()): ?>
									<div class="img-noticia">
										<a href="'<?php the_permalink(); ?>'">  <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?></a>
									</div>
								<?php endif ?>
								<h2><?php the_title(  ); ?></h2>
								<div class="info-adicional">
		              				<div class="pull-left">
										<i class="fa fa-calendar-o"></i> <?php the_time('j  F,  Y'); ?> |
										<!--<i class="fa fa-user"></i> <?php  the_author(); ?> |-->
										<i class="fa fa-comment-o"></i> <?php comments_number('Nenhum comentário', '1 comentário', '% comentários'); ?>
									</div>
									<div class="pull-right">
										Categoria: <?php the_category(' '); ?>
									</div>
									<div class="clearfix"></div>
								</div>
								<p> <?php the_content(); ?> </p>

								<?php $tag_single = get_the_tags( $post->ID ); ?>
								<?php if (!empty($tag_single)): ?>
									<div class="tags">
										<?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
									</div>
								<?php endif ?>

								<div class="author">
									<div class="row">
										<div class="col-md-2">
											<?php $email = get_the_author_email();
											$grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&default=".urlencode($GLOBALS['defaultgravatar'] );
											$usegravatar = get_option('woo_gravatar');?>
											<img src="<?php echo $grav_url; ?>" alt="" class="img-responsive" />
										</div>
										<div class="col-md-10">
											<h4><a href = "<?php the_author_url ();?>" itemprop="url"><?php the_author(); ?></a></h4>
											<?php the_author_description();?>
										</div>
									</div>
								</div>

							</article>

							<div class="author comentario">
								<?php  comments_template(get_template_directory_uri() . '/comments.php', true); ?>
							</div>

						<?php endwhile; ?>
					<?php
						else:
							echo "Nenhum post encontrado";
						endif ?>
				</div>
				<div class="col-md-3">
					<?php get_sidebar( ); ?>
				</div>
			</div>
		</div>
	</main>
<?php get_footer( );  ?>
