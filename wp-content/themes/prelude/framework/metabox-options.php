<?php
/**
 * Metabox Options
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return the registered-widget array
function prelude_get_widget_registered() {
	global $wp_registered_sidebars;

	$widgets_areas = array();
	if ( ! empty( $wp_registered_sidebars ) ) {
		foreach ( $wp_registered_sidebars as $widget_area ) {
			$name = isset ( $widget_area['name'] ) ? $widget_area['name'] : '';
			$id = isset ( $widget_area['id'] ) ? $widget_area['id'] : '';
			if ( $name && $id ) {
				$widgets_areas[$id] = $name;
			}
		}
	}

	return $widgets_areas;
}

// Return the all-widget array
function prelude_get_widget_mods() {
	$new_arr = array();
	$widget_areas_mod = prelude_get_mod( 'widget_areas' );
	
	if (is_array($widget_areas_mod) || is_object($widget_areas_mod)) {
		foreach( $widget_areas_mod as $key ) {
			$new_arr[sanitize_key($key)] = $key;
		}
	}
	
	$widget_areas = prelude_get_widget_registered() + $new_arr;

	return $widget_areas;
}

// Registering meta boxes. Using Meta Box plugin: https://metabox.io/
function prelude_register_meta_boxes( $meta_boxes ) {
	// Element Thumbnail
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Element Thumbnail', 'prelude' ),
		'id'     => 'opt-meta-box-element-thumbnail',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Image', 'prelude' ),
				'id'   => 'element_thumbnail',
				'type' => 'image_advanced',
				'max_file_uploads' => 1
			),
		),
	);
	// Post Format Gallery
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Gallery', 'prelude' ),
		'id'     => 'opt-meta-box-post-format-gallery',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Images', 'prelude' ),
				'id'   => 'gallery_images',
				'type' => 'image_advanced',
			),
		),
	);

	// Post Format Video
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Post Format: Video ( Embeded video from youtube, vimeo...)', 'prelude' ),
		'id'     => 'opt-meta-box-post-format-video',
		'pages'  => array( 'post' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Video URL or Embeded Code', 'prelude' ),
				'id'   => 'video_url',
				'type' => 'textarea',
			),
		)
	);

	// Partner
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Partner Settings', 'prelude' ),
		'id'     => 'opt-meta-box-partner',
		'pages'  => array( 'partner' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hyperlink', 'prelude' ),
				'id'   => 'partner_hyperlink',
				'type'       => 'text',
				'desc'  => esc_html__( "Partne's URL. Leave blank to disable (please 'http://' included).", 'prelude' )
			),
		)
	);

	// Portfolio
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Project Settings', 'prelude' ),
		'id'     => 'opt-meta-box-project',
		'pages'  => array( 'project' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Custom Title', 'prelude' ),
				'id'   => 'title',
				'type' => 'textarea',
			),
			array(
				'name'    => esc_html__( 'Image Cropping', 'prelude' ),
				'id'      => 'image_crop',
				'type'    => 'select',
				'options' => array(
					'full' => esc_html__( 'Full', 'prelude' ),
					'square' => esc_html__( '570 x 570', 'prelude' ),
					'square2' => esc_html__( '370 x 370', 'prelude' ),
					'rectangle' => esc_html__( '570 x 450', 'prelude' ),
					'rectangle2' => esc_html__( '570 x 400', 'prelude' ),
					'rectangle3' => esc_html__( '370 x 250', 'prelude' ),
					'rectangle4' => esc_html__( '370 x 370', 'prelude' ),
					'rectangle5' => esc_html__( '370 x 550', 'prelude' )
				),
				'std'     => 'full',
			),
		)
	);

	// Member
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Member Information', 'prelude' ),
		'id'     => 'opt-meta-box-pages',
		'pages'  => array( 'member' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Name', 'prelude' ),
				'id'   => 'name',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Position', 'prelude' ),
				'id'   => 'position',
				'type'       => 'textarea',
			),
			array(
				'name' => esc_html__( 'Text', 'prelude' ),
				'id'   => 'text',
				'type'       => 'textarea',
			),
			array(
				'name' => esc_html__( 'Facebook', 'prelude' ),
				'id'   => 'facebook',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Twitter', 'prelude' ),
				'id'   => 'twitter',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Linkedin', 'prelude' ),
				'id'   => 'linkedin',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Google +', 'prelude' ),
				'id'   => 'google_plus',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Instagram', 'prelude' ),
				'id'   => 'instagram',
				'type'       => 'text',
			),
		)
	);

	// Testimonials
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Testimonials Information', 'prelude' ),
		'id'     => 'opt-meta-box-pages',
		'pages'  => array( 'testimonials' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Name', 'prelude' ),
				'id'   => 'name',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Position', 'prelude' ),
				'id'   => 'position',
				'type'       => 'text',
			),
			array(
				'name' => esc_html__( 'Text', 'prelude' ),
				'id'   => 'text',
				'type' => 'textarea',
			),
		)
	);

	// Top Bar Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Top-Bar Settings', 'prelude' ),
		'id'     => 'opt-meta-box-top-bar',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Style', 'prelude' ),
				'id'      => 'top_bar_style',
				'type'    => 'select',
				'options' => array(
					'hide' => esc_html__( 'Hide', 'prelude' ),
					'style-1' => esc_html__( 'Dark-Text', 'prelude' ),
					'style-2' => esc_html__( 'Light-Text', 'prelude' ),
				),
				'std'     => 'hide',
			),
			array(
			    'name'	=> esc_html__( 'Background', 'prelude' ),
			    'id'	=> 'top_bar_background',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name' => esc_html__( 'Border Width', 'prelude' ),
				'id'   => 'top_bar_border_width',
				'type' => 'text',
				'desc'    => esc_html__( 'Top Right Bottom Left. Ex: 0px 0px 1px 0px', 'prelude' )
			),
			array(
			    'name'	=> esc_html__( 'Border Color', 'prelude' ),
			    'id'	=> 'top_bar_border_color',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
		)
	);

	// Header Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Header Settings', 'prelude' ),
		'id'     => 'opt-meta-box-header',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Custom Logo', 'prelude' ),
			    'type' => 'single_image',
			    'id'   => 'custom_header_logo',
			),
			array(
				'name'    => esc_html__( 'Style', 'prelude' ),
				'id'      => 'header_style',
				'type'    => 'select',
				'options' => array(
					'style-1' => esc_html__( 'Dark-Text', 'prelude' ),
					'style-2' => esc_html__( 'Light-Text', 'prelude' ),
					'style-3' => esc_html__( 'Transparent Dark-Text', 'prelude' ),
					'style-4' => esc_html__( 'Transparent Light-Text', 'prelude' ),
				),
				'std'     => 'style-1',
			),
			array(
			    'name'	=> esc_html__( 'Background', 'prelude' ),
			    'id'	=> 'header_background',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name' => esc_html__( 'Border Width', 'prelude' ),
				'id'   => 'header_border_width',
				'type' => 'text',
				'desc'    => esc_html__( 'Top Right Bottom Left. Ex: 0px 0px 1px 0px', 'prelude' )
			),
			array(
			    'name'	=> esc_html__( 'Border Color', 'prelude' ),
			    'id'	=> 'header_border_color',
			    'type'	=> 'color',
			    'alpha_channel' => true,
			    'js_options'    => array(
			        'palettes' => array( '#000000', '#ffffff', '#dd3333', '#dd9933', '#eeee22', '#81d742', '#1e73be', '#8224e3' )
			    ),
			),
			array(
				'name'    => esc_html__( 'Button Style', 'prelude' ),
				'id'      => 'header_btn_style',
				'type'    => 'select',
				'options' => array(
					'header-btn-1' => esc_html__( 'Style 1', 'prelude' ),
					'header-btn-2' => esc_html__( 'Style 2', 'prelude' ),
					'header-btn-3' => esc_html__( 'Style 3', 'prelude' ),
					'header-btn-4' => esc_html__( 'Style 4', 'prelude' ),
					'header-btn-5' => esc_html__( 'Style 5', 'prelude' ),
					'header-btn-6' => esc_html__( 'Style 6', 'prelude' ),
				),
				'std'     => 'header-btn-1',
			),
		)
	);

	// Featured Title Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Featured Title Settings', 'prelude' ),
		'id'     => 'opt-meta-box-featured-title',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide?', 'prelude' ),
				'id'   => 'hide_featured_title',
				'type' => 'checkbox',
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Background', 'prelude' ),
				'id'		=>	'featured_title_bg',
			    'max_file_uploads' => 1,
			),
			array(
				'type'		=>	'text',
				'name'		=>	esc_html__( 'Custom Title', 'prelude' ),
				'id'		=>	'custom_featured_title',
			),
		)
	);

	// Main Content Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Main Content Settings', 'prelude' ),
		'id'     => 'opt-meta-box-main-content',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name'    => esc_html__( 'Layout Position', 'prelude' ),
				'id'      => 'page_layout',
				'type'    => 'image_select',
				'options' => array(
					'no-sidebar'  => get_template_directory_uri() . '/assets/admin/img/full-content.png',
					'sidebar-left'  => get_template_directory_uri() . '/assets/admin/img/sidebar-left.png',
					'sidebar-right' => get_template_directory_uri() . '/assets/admin/img/sidebar-right.png',
				),
				'std' 		=> 'no-sidebar',
			),
			array(
				'name'    => esc_html__( 'Sidebar', 'prelude' ),
				'id'      => 'page_sidebar',
				'type'    => 'select',
				'options' => prelude_get_widget_mods(),
				'std'     => 'sidebar-page',
				'desc'    => esc_html__( 'This option do not apply if Layout Position is full-width.', 'prelude' )
			),
			array(
			    'name'          => 'Background Color',
			    'id'            => 'main_content_bg',
			    'type'          => 'color',
			    'alpha_channel' => true,
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Background Image', 'prelude' ),
				'id'		=>	'main_content_bg_img',
			    'max_file_uploads' => 1,
			),
			array(
				'name' => esc_html__( 'Remove: Top & Bottom Padding?', 'prelude' ),
				'id'   => 'hide_padding_content',
				'type' => 'checkbox',
			),
		)
	);

	// Footer Settings
	$meta_boxes[] = array(
		'title'  => esc_html__( 'Footer Settings', 'prelude' ),
		'id'     => 'opt-meta-box-footer',
		'pages'  => array( 'page' ),
		'fields' => array(
			array(
				'name' => esc_html__( 'Hide: Footer?', 'prelude' ),
				'id'   => 'hide_footer',
				'type' => 'checkbox',
			),
			array(
				'name'    => esc_html__( 'Pre-Footer', 'prelude' ),
				'id'      => 'pre_footer_type',
				'type'    => 'select',
				'options' => array(
					'' => esc_html__( 'Disable', 'prelude' ),
					'promo' => esc_html__( 'Promotion', 'prelude' ),
					'subs' => esc_html__( 'Subscribe', 'prelude' ),
				),
				'std'     => '',
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Pre-Footer: Promotion Background Image', 'prelude' ),
				'id'		=>	'pre_footer_promo_bg',
			    'max_file_uploads' => 1,
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Pre-Footer: Subscribe Background Image', 'prelude' ),
				'id'		=>	'pre_footer_subs_bg',
			    'max_file_uploads' => 1,
			),
			array(
			    'name'          => 'Footer Widget: Background',
			    'id'            => 'footer_bg',
			    'type'          => 'color',
			    'alpha_channel' => true,
			),
			array(
				'type'		=>	'image_advanced',
				'name'		=>	esc_html__( 'Footer Widget: Image Background', 'prelude' ),
				'id'		=>	'footer_bg_img',
			    'max_file_uploads' => 1,
			),
			array(
			    'name'          => 'Bottom Bar: Background',
			    'id'            => 'bottom_bg',
			    'type'          => 'color',
			    'alpha_channel' => true,
			),
			array(
				'name' => esc_html__( 'Hide: Line Footer?', 'prelude' ),
				'id'   => 'hide_line_footer',
				'type' => 'checkbox',
			),
			array(
				'name'    => esc_html__( 'Widget-Logo Option', 'prelude' ),
				'id'      => 'logo_widget',
				'type'    => 'select',
				'options' => array(
					'green' => esc_html__( 'Default', 'prelude' ),
					'blue' => esc_html__( 'Blue', 'prelude' ),
					'orange' => esc_html__( 'Orange', 'prelude' ),
					'red' => esc_html__( 'Red', 'prelude' ),
				),
				'std'     => 'green',
			),
		)
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'prelude_register_meta_boxes' );