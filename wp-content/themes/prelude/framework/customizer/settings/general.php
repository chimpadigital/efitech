<?php
/**
 * General setting for Customizer
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Accent Colors
$this->sections['prelude_accent_colors'] = array(
	'title' => esc_html__( 'Accent Colors', 'prelude' ),
	'panel' => 'prelude_general',
	'settings' => array(
		array(
			'id' => 'accent_color',
			'default' => '#00d664',
			'control' => array(
				'label' => esc_html__( 'Accent Color', 'prelude' ),
				'type' => 'color',
			),
		),
	)
);

// Favicon
$this->sections['prelude_favicon'] = array(
	'title' => esc_html__( 'Favicon', 'prelude' ),
	'panel' => 'prelude_general',
	'settings' => array(
		array(
			'id' => 'favicon',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Site Icon', 'prelude' ),
				'type' => 'image',
				'description' => esc_html__( 'The Site Icon is used as a browser and app icon for your site. Icons must be square, and at least 512 pixels wide and tall.', 'prelude' ),
			),
		),
	)
);

// PreLoader
$this->sections['prelude_preloader'] = array(
	'title' => esc_html__( 'PreLoader', 'prelude' ),
	'panel' => 'prelude_general',
	'settings' => array(
		array(
			'id' => 'preloader',
			'default' => 'animsition',
			'control' => array(
				'label' => esc_html__( 'Preloader Option', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'animsition' => esc_html__( 'Enable','prelude' ),
					'' => esc_html__( 'Disable','prelude' )
				),
			),
		),
		array(
			'id' => 'preload_color_1',
			'default' => '#00d664',
			'control' => array(
				'label' => esc_html__( 'Color 1', 'prelude' ),
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => '.animsition-loading',
				'alter' => 'border-top-color',
			),
		),
		array(
			'id' => 'preload_color_2',
			'default' => '#0575e6',
			'control' => array(
				'label' => esc_html__( 'Color 2', 'prelude' ),
				'type' => 'color',
			),
			'inline_css' => array(
				'target' => '.animsition-loading:before',
				'alter' => 'border-top-color',
			),
		),
	)
);

// Top Bar Site
$this->sections['prelude_topbar_site'] = array(
	'title' => esc_html__( 'Top Bar Site', 'prelude' ),
	'panel' => 'prelude_general',
	'settings' => array(
		array(
			'id' => 'top_bar_site_style',
			'default' => 'hide',
			'control' => array(
				'label' => esc_html__( 'Top Bar Style', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'hide' => esc_html__( 'Hide', 'prelude' ),
					'style-1' => esc_html__( 'Dark-Text', 'prelude' ),
					'style-2' => esc_html__( 'Light-Text', 'prelude' ),
				),
				'desc' => esc_html__( 'Top Bar Style for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'prelude' )
			),
		),
	),
);

// Header Site
$this->sections['prelude_header_site'] = array(
	'title' => esc_html__( 'Header Site', 'prelude' ),
	'panel' => 'prelude_general',
	'settings' => array(
		array(
			'id' => 'header_site_style',
			'default' => 'style-1',
			'control' => array(
				'label' => esc_html__( 'Header Style', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'style-1' => esc_html__( 'Dark-Text', 'prelude' ),
					'style-2' => esc_html__( 'Light-Text', 'prelude' ),
					'style-3' => esc_html__( 'Transparent Dark-Text', 'prelude' ),
					'style-4' => esc_html__( 'Transparent Light-Text', 'prelude' ),
				),
				'desc' => esc_html__( 'Header Style for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'prelude' )
			),
		),
		array(
			'id' => 'header_fixed',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Header Fixed: Enable', 'prelude' ),
				'type' => 'checkbox',
			),
		),
	),
);

// Scroll to top
$this->sections['prelude_scroll_top'] = array(
	'title' => esc_html__( 'Scroll Top Button', 'prelude' ),
	'panel' => 'prelude_general',
	'settings' => array(
		array(
			'id' => 'scroll_top',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'prelude' ),
				'type' => 'checkbox',
			),
		),
	),
);

// Forms
$this->sections['prelude_general_forms'] = array(
	'title' => esc_html__( 'Forms', 'prelude' ),
	'panel' => 'prelude_general',
	'settings' => array(
		array(
			'id' => 'input_border_rounded',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Rounded', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-radius',
			),
		),
		array(
			'id' => 'input_background_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'input_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-color',
			),
		),
		array(
			'id' => 'input_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'prelude' ),
				'description' => esc_html__( 'Enter a value in pixels. Example: 1px', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'input_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'textarea,input[type="text"],input[type="password"],input[type="datetime"],input[type="datetime-local"],input[type="date"],input[type="month"],input[type="time"],input[type="week"],input[type="number"],input[type="email"],input[type="url"],input[type="search"],input[type="tel"],input[type="color"]',
				),
				'alter' => 'color',
			),
		),
	),
);

// Responsive
$this->sections['prelude_responsive'] = array(
	'title' => esc_html__( 'Responsive', 'prelude' ),
	'panel' => 'prelude_general',
	'settings' => array(
		// Top Bar
		array(
			'id' => 'heading_top_bar',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Top Bar', 'prelude' ),
			),
		),
		array(
			'id' => 'mobile_hide_top_bar',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Hide: Top Bar on Mobile', 'prelude' ),
				'type' => 'checkbox',
			),
		),
		// Mobile Logo
		array(
			'id' => 'heading_mobile_logo',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Mobile Logo', 'prelude' ),
			),
		),
		array(
			'id' => 'mobile_logo_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Mobile Logo: Width', 'prelude' ),
				'description' => esc_html__( 'Example: 150px', 'prelude' ),
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '#site-logo',
				'alter' => 'max-width',
			),
		),
		array(
			'id' => 'mobile_logo_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Mobile Logo: Margin', 'prelude' ),
				'description' => esc_html__( 'Example: 20px 0px 20px 0px', 'prelude' ),
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '#site-logo-inner',
				'alter' => 'margin',
			),
		),
		// Mobile Menu
		array(
			'id' => 'heading_mobile_menu',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Mobile Menu', 'prelude' ),
			),
		),
		array(
			'id' => 'mobile_menu_item_height',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Item Height', 'prelude' ),
				'description' => esc_html__( 'Example: 40px', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'#main-nav-mobi ul > li > a',
					'#main-nav-mobi .menu-item-has-children .arrow'
				),
				'alter' => 'line-height'
			),
		),
		array(
			'id' => 'mobile_menu_logo',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Mobile Menu Logo', 'prelude' ),
				'type' => 'image',
			),
		),
		array(
			'id' => 'mobile_menu_logo_width',
			'control' => array(
				'label' => esc_html__( 'Mobile Menu Logo: Width', 'prelude' ),
				'type' => 'text',
			),
		),
		// Featured Title
		array(
			'id' => 'heading_featured_title',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Mobile Featured Title', 'prelude' ),
			),
		),
		array(
			'id' => 'mobile_featured_title_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'prelude' ),
				'active_callback' => 'prelude_cac_has_featured_title',
			),
			'inline_css' => array(
				'media_query' => '(max-width: 991px)',
				'target' => '.header-style-1 #featured-title .inner-wrap, .header-style-2 #featured-title .inner-wrap, .header-style-3 #featured-title .inner-wrap, .header-style-4 #featured-title .inner-wrap	',
				'alter' => 'padding',
			),
		),
	)
);