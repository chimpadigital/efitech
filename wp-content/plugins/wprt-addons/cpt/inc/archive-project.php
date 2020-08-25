<?php get_header(); ?>

<div id="content-wrap" class="prelude-container">
    <div id="site-content" class="site-content clearfix archive-project">
    	<div id="inner-content" class="inner-content-wrap">
			<?php if ( have_posts() ) : ?>
				<div class="prelude-project-grid" data-layout="grid" data-column="3" data-column2="3" data-column3="2" data-column4="1" data-gaph="30" data-gapv="30">
					<div id="portfolio" class="cbp">
					    <?php while ( have_posts() ) : the_post();
							wp_enqueue_script( 'prelude-cubeportfolio' ); ?>

				            <div class="cbp-item">
								<div class="project-box style-1">
									<?php
										$hover_text = $title_html = $hover_text_html = '';

						            	$title = prelude_metabox( 'title' ) ? prelude_metabox( 'title' ) : get_the_title();
						            	$title_html = sprintf('<h4 class="title"><a href="%1$s" title="%2$s">%2$s</a></h4>', esc_url( get_the_permalink() ), esc_attr( $title ) );

										echo '<div class="project-wrap"><div class="project-image"><div class="inner">'. get_the_post_thumbnail( get_the_ID(), 'prelude-rectangle3' ) .'<div class="project-text">'. $title_html .'</div></div></div></div>';
									?>
								</div><!-- /.project-box -->
				            </div><!-- /.cbp-item -->
						<?php endwhile; ?>
					</div><!-- /#portfolio -->

					<?php prelude_pagination(); ?>
				</div><!-- /.prelude-project-grid -->
			<?php endif; ?>
    	</div>
    </div><!-- /#site-content -->
</div><!-- /#content-wrap -->

<?php get_footer(); ?>