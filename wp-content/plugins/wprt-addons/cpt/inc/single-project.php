<?php
get_header();

$pre_title = prelude_get_mod( 'related_pre_title', 'WE ARE A CREATIVE STUDIO FOUNDED IN NYC' );
$title = prelude_get_mod( 'related_title', 'Related projects' );
$related_query = prelude_get_mod( 'project_related_query', '7' );
$related_column = prelude_get_mod( 'project_related_column', '3' );
$related_item_gap = prelude_get_mod( 'project_related_item_spacing', '30' );

$terms = get_the_terms( $post->ID, 'project_category' );
$term_ids = wp_list_pluck( $terms, 'term_id' );
?>
<div class="project-detail-wrap">
	<div class="prelude-container">
		<?php
		while ( have_posts() ) : the_post();
			the_content();
		endwhile; ?>
	</div>
</div>

<?php if ( prelude_get_mod( 'project_related', true )  ): ?>
<div class="project-related-wrap">
		<div class="prelude-container">
		<div class="clearfix">
			<div class="title-wrap">
				<div class="pre-title"><?php echo esc_html( $pre_title ); ?></div>
				<h2 class="title"><?php echo esc_html( $title ); ?></h2>
			</div>
		</div>
		<?php
		$query_args = array(
			'post_type' => 'project',
			'tax_query' => array(
				array(
				'taxonomy' => 'project_category',
				'field' => 'term_id',
				'terms' => $term_ids,
				'operator'=> 'IN'
				)),
			'ignore_sticky_posts' => 1,
			'post__not_in'=> array( $post->ID )
		);

		$query_args['posts_per_page'] = $related_query;
		$query = new WP_Query( $query_args );
		if ( $query->have_posts() ) :
			$terms = wp_get_post_terms( get_the_ID(), 'project_category' ); ?>

			<div class="project-related" data-gap="<?php echo esc_html( $related_item_gap ); ?>" data-column="<?php echo esc_html( $related_column ); ?>">
				<div class="owl-carousel owl-theme">
					<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<?php wp_enqueue_script( 'prelude-owlcarousel' ); ?>

					<div class="project-box style-1">
						<?php
							$img_size = 'prelude-rectangle3';
							$title = $hover_text = '';

			            	$title = prelude_metabox( 'title' ) ? prelude_metabox( 'title' ) : get_the_title();
			            	$title_html = sprintf('<h4 class="title"><a href="%1$s" title="%2$s">%2$s</a></h4>', esc_url( get_the_permalink() ), esc_attr( $title ) );

			            	$hover_text = $hover_text ? $hover_text : get_the_title();
			            	$hover_text_html = sprintf('<h4 class="title"><a href="%1$s" title="%2$s">%2$s</a></h4>', esc_url( get_the_permalink() ), esc_attr( $hover_text ) );

							echo '<div class="project-wrap"><div class="project-image"><div class="inner">'. get_the_post_thumbnail( get_the_ID(), $img_size ) .'<div class="project-text">'. $title_html .'</div></div></div></div>';
						?>
					</div><!-- /.project-box -->
					<?php endwhile; ?>
				</div><!-- /.owl-carousel -->
			</div><!-- /.project-related -->
		<?php
		endif; wp_reset_postdata();
		?>
	</div><!-- /.prelude-container -->
</div><!-- /.project-related-wrap -->
<?php endif; ?>

<?php get_footer(); ?>