<?php
/**
 * Footer Subscribe
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$css = '';
$heading = prelude_get_mod( 'subscribe_heading', 'Subscribe to get the latest news' );
$subheading = prelude_get_mod( 'subscribe_subheading', 'By clicking subscribe, you are opting in to receive out updates' );

$css = prelude_element_bg_css('subscribe_bg_img');
if ( is_page() ) {
	if ( prelude_metabox('pre_footer_subs_bg') ) {
		$images = prelude_metabox( 'pre_footer_subs_bg', array( 'size' => 'full', 'limit' => 1 ) );
		$image = reset( $images );
		$css = 'background-image: url('. esc_url( $image['url'] ). ');';
	}
} ?>

<div class="footer-subscribe" style="<?php echo esc_attr( $css ); ?>">
	<div class="subscribe-wrap">
		<h5 class="subscribe-heading"><?php echo do_shortcode( $heading ); ?></h5>
		<div class="subscribe-subheading"><?php echo do_shortcode( $subheading ); ?></div>
		<?php if ( class_exists('MC4WP_MailChimp') ) {
			echo '<div class="form-wrap">';
			mc4wp_show_form(0);
			echo '</div>';
		} ?>
	</div>
</div>