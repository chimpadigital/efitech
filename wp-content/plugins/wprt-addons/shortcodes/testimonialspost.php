<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$cls = $data = $thumb = $name = $pos = $text = '';

extract( shortcode_atts( array(
	'style' => 'gray',
    'items' => '5',
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

$cls = $style .' col-'. intval( $column ) .' '. $bullet_color .' '. $arrow_color .' arrow-'. $arrows_position;

$query_args = array(
    'post_type' => 'testimonials',
    'posts_per_page' => $items,
);

if ( ! empty( $cat_slug ) ) {
	$query_args['tax_query'] = array(
		array(
			'taxonomy' => 'testimonials_category'
		),
	);
}

$query = new WP_Query( $query_args );
if ( ! $query->have_posts() ) { echo "Testimonials post not found!"; return; }

wp_enqueue_script( 'flickity' );
$data = 'data-deeper-flickity=\'{ "fullwidthSide": '. $aside .', "pageDots": '. $bullets .', "prevNextButtons": '. $arrows .', "autoPlay": '. $auto_play .' }\'';

ob_start();
?>

<div class="prelude-testimonials <?php echo $cls; ?>" <?php echo $data; ?>>
<?php $i = 0; if ( $query->have_posts() ) : ?>
	
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
		<div class="item"><div class="inner">
			<svg viewBox="0 0 69.312 42.932" style="width: 70px; fill: #eee;">
				<path d="M22.5,42.932c-0.164,0-0.332-0.017-0.492-0.048C5.384,39.536,0,25.724,0,19.564v-3.868
					C0,7.188,7.392,0,16.136,0c8.908,0,15.936,7.188,15.936,15.696c0,4.516-0.072,10.64-8.072,12.152v12.584
					c0,0.752,0.164,1.46-0.416,1.933C23.136,42.736,23.076,42.932,22.5,42.932"/>
				<path d="M57.5,42.932c-0.164,0,0.168-0.017,0.008-0.048C40.884,39.536,36,25.724,36,19.564
					v-3.868C36,7.336,43.389,0,52.376,0c9.16,0,16.937,7.336,16.937,15.696c0,4.62-3.384,10.828-9.313,12.213v12.52
					c0,0.752-0.336,1.46-0.916,1.932C58.637,42.736,58.076,42.932,57.5,42.932"/>
			</svg>
	 		<?php
	        if ( $text = prelude_metabox( 'text' ) )
	        	$text = '<div class="text">'. $text .'</div>';

			if ( has_post_thumbnail() )
	 		 	$thumb = get_the_post_thumbnail( get_the_ID(), 'full' );
	        
	        if ( $name = prelude_metabox( 'name' ) )
	        	$name = '<h4 class="name">'. $name .'</h4>';

	        $stars = '<div class="stars"></div>';

	        printf(
	        	'<div class="text">%s</div>
	        	<div class="thumb">%s</div>
	        	<div class="person">%s %s</div>',
	        	$text,
        		$thumb,
        		$name,
        		$stars
        	);
	        ?>
		</div></div>
	<?php endwhile; ?>

<?php endif; ?>
<?php wp_reset_postdata(); ?>
</div><!-- /.prelude-testimonials -->

<?php
$return = ob_get_clean();
echo $return;