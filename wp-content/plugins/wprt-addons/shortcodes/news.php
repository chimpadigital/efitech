<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$data = '';

extract( shortcode_atts( array(
	'style' => 'style-1',
	'thumb' => 'featured-image',
	'items'		=> '5',
	'cat_slug' => '',
    'aside' => 'false',
	'auto_play' => 'false',
	'bullets' => 'false',
	'bullet_color' => 'bullet-accent',
	'arrows' => 'false',
	'arrow_color' => 'arrow-accent',
	'arrows_position' => 'middle',
	'column' => '3c'
), $atts ) );

$items = intval( $items );
if ( empty( $items ) ) return;

$cls = $style .' col-'. intval( $column ) .' '. $bullet_color .' '. $arrow_color .' arrow-'. $arrows_position;

$query_args = array(
    'post_type' => 'post',
    'posts_per_page' => $items
);

if ( ! empty( $cat_slug ) )
	$query_args['category_name'] = $cat_slug;

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) { return; }

wp_enqueue_script( 'flickity' );
$data = 'data-deeper-flickity=\'{ "fullwidthSide": '. $aside .', "pageDots": '. $bullets .', "prevNextButtons": '. $arrows .', "autoPlay": '. $auto_play .' }\'';

ob_start(); ?>

<div class="prelude-news clearfix <?php echo $cls; ?>" <?php echo $data; ?>>
<?php if ( $query->have_posts() ) : ?>
    <?php $i = 0; while ( $query->have_posts() ) : $query->the_post(); ?>
		<?php
		$img = $img_size = 'prelude-post-element';

		if ( $thumb == 'element-thumbnail'  ) {
			$images = prelude_metabox( 'element_thumbnail', "type=image&size=$img_size" );

			foreach ( $images as $image ) {
				$img = $image['url'];
			}
		}

		if ( $thumb == 'featured-image' && has_post_thumbnail() )
			$img = prelude_get_image( array( 'size' => $img_size, 'format' => 'src' ) );

		?>
		<div class="post-item clearfix <?php if ( $i == 0 ) { echo "first-post"; } ?>" style="background-image: url(<?php if ( $i == 0 ) echo $img; ?>);">
			<div class="inner">
				<?php

				echo '<h3 class="title"><span><a href="'. esc_url( get_the_permalink() ) .'">'. get_the_title() .'</a></span></h3>';

                if ( $i== 0 ) echo '<div class="excerpt">'. prelude_trim_words( get_the_excerpt(), 14 ) .'</div>';

				$avarta = get_avatar( get_the_author_meta('email'), '120' );
				printf( '<div class="gravatar">%s</div>', $avarta );

				echo '<div class="post-meta">';
					printf( '<span class="author">%s</span><span class="date">%s</span>', get_the_author(), get_the_date() );
				echo '</div>';

				echo '<div class="url-wrap"><a target="_blank" class="prelude-arrow gray" href="'. get_the_permalink() .'"><span class="core-icon-arrow-right"></span></a></div>';
				?>
	        </div>
	    </div><!-- /.news-item -->
	    
	<?php $i++; endwhile; ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>
</div><!-- /.prelude-news -->
<?php
$return = ob_get_clean();
echo $return;