<?php
/*
Template name: Blog
*/

get_header(); ?>
<section class="full-banner-topo blog ">
    <div class="titulo-page">

		<h1>
			<span class="titulo-1">Blog</span><?php if ( $paged < 2 ) { } else { echo ' - Página '.$paged;} ?>
		</h1>

        <?php if ( function_exists('yoast_breadcrumb') ) {
            yoast_breadcrumb('<p id="breadcrumbs">','</p>');
        } ?>
    </div>

    <div class="capa"></div>
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-page.jpg">
</section>
<section class="conteudo-page">

	<!-- <div class="content-blog">
		<?php if ($paged < 2){?>

		<?php
		/* Get all sticky posts */
		$sticky = get_option( 'sticky_posts' );
		/* Sort the stickies with the newest ones at the top */
		rsort( $sticky );
		/* Get the 2 newest stickies (change 2 for a different number) */
		$sticky = array_slice( $sticky, 0, 2 );
		$fixed = array(
			'post__in'       => $sticky,
			'type'           => 'post',
			'caller_get_posts' => 1
			);
		$the_query = new WP_Query($fixed);

		if($the_query->have_posts()) : while($the_query->have_posts()) {
			$the_query->the_post(); ?>
			<div class="post-destaque">
				<article>
					<h2 itemprop="headline" ><a href="<?php the_permalink() ?>"><?php the_title()?></a></h2>
					<span class="dados-autor"><i class="icon-user"></i> Por <span itemprop="author"> <?php the_author_posts_link(); ?></span>
					<br><i class="icon-calendar"></i> <?php the_time('j.m.Y');?>
				</span>
				<span class="icone-leia"><a href="<?php the_permalink() ?>">Continue lendo<i class="icon-plus"></i></a></span>
				<div class="imagem-post">
					<a href="<?php the_permalink() ?>"  title="Ver <?php the_title()?>" >
						<?php if (has_post_thumbnail($post->ID )): ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<img itemprop="image" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="img-responsive" />
						<?php else: ?>
							<img itemprop="image" src="<?php echo get_template_directory_uri(); ?>/assets/images/blog-padrao.jpg" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="img-responsive"/>
						<?php endif; ?>
					</a>
				</div>
				<span class="tags"><?php echo get_the_tag_list('',', ','');
					?></span>
				</article>
			</div>
			<?php }
			endif; ?>
			<?php wp_reset_query();?>

			<?php } ?>
	</div> -->



		<!--posts-normais-->

		<div class="second-content">

			<div class="corpo-left">

				<?php
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
				$args = array(
					'post_type' => 'post',
					'order'=> 'DSC',
					'posts_per_page' => 4,
					'paged'=>$paged
					);

				$the_query = new WP_Query( $args );
				if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
				?>
				<div class="post-normal">
					<article>
						<div class="imagem-post">
							<a href="<?php the_permalink() ?>"  title="Ver <?php the_title()?>" >
								<?php if (has_post_thumbnail($post->ID )): ?>
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<img itemprop="image" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="img-responsive" />
								<?php else: ?>

								<?php endif; ?>
							</a>
						</div>
						<h2 itemprop="headline" ><a href="<?php the_permalink() ?>"><?php the_title()?></a></h2>

						<br>
						<div class="dados-post">
							<i class="icon-calendar-empty"></i> <?php the_time('j.m.Y');?></span>
						</div>

						 <?php the_content_limit(80);?>
						<span class="tags"><?php echo get_the_tag_list('',' ','');?></span>


					</article>
					<span class="icone-leia"><a href="<?php the_permalink() ?>">Continue lendo<i class="icon-plus"></i></a></span>

				</div>

			<?php endwhile; ?>
			<div class="navegacao">

				<?php the_posts_pagination( array(
					'mid_size' => 2,
					'prev_text' => __( '<i class="icon-angle-double-left"></i>', 'textdomain' ),
					'next_text' => __( '<i class="icon-angle-double-right"></i>', 'textdomain' ),
					) ); ?>
				</div>
			<?php else: ?>
					<h2>Ainda não há artigos publicados</h2>
			<?php endif; ?>

		</div><!--corpo-left-->
		<?php include( TEMPLATEPATH. '/sidebar.php');?>
	</div>
</section>




<?php get_footer(); ?>
