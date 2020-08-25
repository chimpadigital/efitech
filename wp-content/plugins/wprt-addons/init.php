<?php 
/*
Plugin Name: WPRT Addons 
Plugin URI: http://rollthemes.com/plugins/
Description: Extend Visual Composer with Advanced Shortcodes.
Version: 3.7.9
Author: RollThemes
Author URI: http://rollthemes.com
*/

/**
 * Plugin Name: GaviasFramework
 * Description: Open Setting, Post Type, Shortcode ... for theme 
 * Version: 1.0.0
 * Author: Gaviasthemes Team
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Enqueue scripts
add_action( 'wp_enqueue_scripts', 'loadCssAndJs', 999999 );
function loadCssAndJs() {
	wp_enqueue_style( 'prelude-owlcarousel', plugins_url('assets/owl.carousel.css', __FILE__), array(), '2.2.1' );
	wp_register_script( 'prelude-owlcarousel', plugins_url('assets/owl.carousel.min.js', __FILE__), array('jquery'), '2.2.1', true );

	wp_enqueue_style( 'slick', plugins_url('assets/slick.css', __FILE__), array(), '1.6.0' );
	wp_register_script( 'slick', plugins_url('assets/slick.js', __FILE__), array('jquery'), '1.6.0', true );
	
	wp_enqueue_script( 'prelude-imagesloaded', plugins_url('assets/imagesloaded.js', __FILE__), array('jquery'), '4.1.3', true );
	wp_enqueue_style( 'prelude-cubeportfolio', plugins_url('assets/cubeportfolio.min.css', __FILE__), array(), '3.4.0' );
	wp_register_script( 'prelude-cubeportfolio', plugins_url('assets/cubeportfolio.min.js', __FILE__), array('jquery'), '3.4.0', true );
	wp_register_script( 'prelude-countto', plugins_url('assets/countto.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'prelude-equalize', plugins_url('assets/equalize.min.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'prelude-magnificpopup', plugins_url('assets/magnific.popup.css', __FILE__), array(), '1.0.0' );
	wp_enqueue_script( 'prelude-magnificpopup', plugins_url('assets/magnific.popup.min.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_style( 'prelude-vegas', plugins_url('assets/vegas.css', __FILE__), array(), '2.3.1' );
	wp_register_script( 'prelude-vegas', plugins_url('assets/vegas.js', __FILE__), array('jquery'), '2.3.1', true );
	wp_enqueue_style( 'prelude-ytplayer', plugins_url('assets/ytplayer.css', __FILE__), array(), '3.0.2' );
	wp_register_script( 'prelude-ytplayer', plugins_url('assets/ytplayer.js', __FILE__), array('jquery'), '3.0.2', true );
	wp_register_script( 'prelude-fittext', plugins_url('assets/fittext.js', __FILE__), array('jquery'), '1.1.0', true );
	wp_register_script( 'prelude-flowtype', plugins_url('assets/flowtype.js', __FILE__), array('jquery'), '1.3.0', true );
	wp_register_script( 'prelude-typed', plugins_url('assets/typed.js', __FILE__), array('jquery'), '1.1.0', true );
	wp_register_script( 'prelude-countdown', plugins_url('assets/countdown.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_register_script( 'prelude-appear', plugins_url('assets/appear.js', __FILE__), array('jquery'), '0.3.6', true );
	wp_enqueue_script( 'prelude-anime', plugins_url('assets/anime.js', __FILE__), array('jquery'), '0.1.0', true );
	wp_enqueue_script( 'prelude-reveal', plugins_url('assets/reveal.js', __FILE__), array('jquery'), '0.1.0', true );
	wp_enqueue_style( 'flickity', plugins_url('assets/flickity.css', __FILE__), array(), '2.2.1' );
	wp_register_script( 'flickity', plugins_url('assets/flickity.js', __FILE__), array('jquery'), '2.2.1', true );
	wp_enqueue_script( 'flickityside', plugins_url('assets/flickityside.js', __FILE__), array('jquery'), '0.1.0', true );
	wp_enqueue_script( 'prelude-wow', plugins_url('assets/wow.min.js', __FILE__), array('jquery'), '0.3.6', true );
	wp_enqueue_script( 'prelude-waitforimages', plugins_url('assets/waitforimages.js', __FILE__), array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'prelude-parallaxscroll', plugins_url('assets/parallax-scroll.js', __FILE__), array('jquery'), '0.2.6', true );
	wp_enqueue_script( 'prelude-shortcode', plugins_url('assets/shortcodes.js', __FILE__), array('jquery'), '1.0', true );
	wp_enqueue_script('google-maps-api', 'https://maps.googleapis.com/maps/api/js', array(), 'v3');
}

// Add image sizes
add_action( 'after_setup_theme', 'add_image_sizes' );
function add_image_sizes() {
	add_image_size( 'prelude-square', 570, 570, true );
	add_image_size( 'prelude-square2', 370, 370, true );
	add_image_size( 'prelude-rectangle', 570, 450, true );
	add_image_size( 'prelude-rectangle2', 570, 400, true );
	add_image_size( 'prelude-rectangle3', 370, 250, true );
	add_image_size( 'prelude-rectangle4', 370, 370, true );
	add_image_size( 'prelude-rectangle5', 370, 550, true );
}

// Map shortcodes to Visual Composer
require_once __DIR__ . '/vc-map.php';

// Include shortcodes files for Visual Composer
foreach ( glob( plugin_dir_path( __FILE__ ) . '/shortcodes/*.php' ) as $file ) {
	$filename = basename( $file );
	$tagname  = str_replace( '-', '_', pathinfo( $file, PATHINFO_FILENAME ) );

	add_shortcode( $tagname, function( $atts, $content = '' ) use( $file, $filename ) {
		ob_start();
		include $file;
		return ob_get_clean();
	} );
}

// Add user contact methods
function prelude_socials_user_contact_methods() {
	$user_contact['user_position']   = esc_html( 'Position' );
	
	$user_contact['user_facebook']   = esc_html( 'Facebook URL' );
	$user_contact['user_twitter'] = esc_html( 'Twitter URL' );
	$user_contact['user_google_plus'] = esc_html( 'Google+ URL' );
	$user_contact['user_linkedin'] = esc_html( 'LinkedIn URL' );
	$user_contact['user_pinterest'] = esc_html( 'Pinterest URL' );
	$user_contact['user_instagram'] = esc_html( 'Instagram URL' );

	return $user_contact;
}
add_filter( 'user_contactmethods', 'prelude_socials_user_contact_methods' );

// Google API
require_once __DIR__ . '/google-api.php';

// Custom Post Type
require_once __DIR__ . '/cpt/init.php';

// Widgets
require_once __DIR__ . '/widgets/init.php';

// Advanced Tabs
require_once __DIR__ . '/shortcodes/advtabs.php';