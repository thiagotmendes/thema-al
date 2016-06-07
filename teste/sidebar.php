<aside class="sidebar">

		<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
			<div id="custom-search-input">
	            <div class="input-group">
	                <input type="text" name="s" id="s" class="search-query form-control" placeholder="Pesquisar" />
	                <span class="input-group-btn">
	                    <button class="btn btn-danger" type="submit">
	                        <i class="icon-search-1"></i>
	                    </button>
	                </span>
	            </div>
	        </div>
		</form>
		<div class="itemSidebar">

			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?><?php endif; ?>


			<div class="post-simples">
			<h2><i class="icon-newspaper"></i> Destaques</h2>
				<ul>
					<?php

							$args = array(
								'post_type' => 'post',
								'category_name' => 'destaque',
								'order'=> 'DSC',
								'posts_per_page' => 4,
								);

							$the_query = new WP_Query( $args );
							if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
							?>
						<li>
							<div class="titulo-simples">
								<h2 itemprop="headline" style="font-size:16px !important; " >
									<a href="<?php the_permalink() ?>" style="color: #12a19a;"><?php the_title()?></a></h2>
								<p style="font-size:12px !important;">
									<?php the_content_limit(100);?>
								</p>
							</div>
							<span class="cont-side">
								<a href="<?php the_permalink() ?>">Leia mais</a>
							</span>
						</li>
						<?php endwhile; ?>
						<?php else: ?>

						<?php endif; ?>
				</ul>
			<span class="icone-leia"><a href="<?php echo get_bloginfo('url');?>/category/newsletter/">Confira mais destaque<i class="icon-plus"></i></a></span>
			</div>
		</div>
		<!-- <div class="itemSidebar">
			<h2><i class="icon-newspaper"></i> Assine nossa newsletter</h2>
			<?php echo do_shortcode('[contact-form-7 id="280" title="Newsletter"]') ?>

		</div> --><!-- ./itemSidebar -->

</aside><!-- /.sidebar -->
