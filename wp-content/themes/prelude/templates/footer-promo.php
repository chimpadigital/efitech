<?php
/**
 * Footer Promotion
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$css = '';
$subheading = prelude_get_mod( 'promo_subheading', 'LET\'S GET STARTED YOUR PROJECT WITH PROFESSIONAL WAY' );
$heading = prelude_get_mod( 'promo_heading', '' );
$button = prelude_get_mod( 'promo_button', 'Contact Us' );
$button_url = prelude_get_mod( 'promo_button_url', '#' );

$css = prelude_element_bg_css('promo_background_img');
if ( is_page() ) {
	if ( prelude_metabox('pre_footer_promo_bg') ) {
		$images = prelude_metabox( 'pre_footer_promo_bg', array( 'size' => 'full', 'limit' => 1 ) );
		$image = reset( $images );
		$css = 'background-image: url('. esc_url( $image['url'] ). ');';
	}
} ?>

<div class="footer-promotion" style="<?php echo esc_attr( $css ); ?>">
	<div class="promo-sub-heading"><?php echo do_shortcode( $subheading ); ?></div>
	<h3 class="promo-heading"><?php echo do_shortcode( $heading ); ?></h3>
	<div class="btn"><a href="<?php echo esc_url( $button_url ); ?>" class="promo-btn"><?php echo esc_html( $button ); ?></a></div>
</div>
