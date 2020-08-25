<?php
/**
 * Layout setting for Customizer
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Layout Style
$this->sections['prelude_layout_style'] = array(
	'title' => esc_html__( 'Layout Site', 'prelude' ),
	'panel' => 'prelude_layout',
	'settings' => array(
		array(
			'id' => 'site_layout_style',
			'default' => 'full-width',
			'control' => array(
				'label' => esc_html__( 'Layout Style', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'full-width' => esc_html__( 'Full Width','prelude' ),
					'boxed' => esc_html__( 'Boxed','prelude' )
				),
			),
		),
		array(
			'id' => 'site_layout_boxed_shadow',
			'control' => array(
				'label' => esc_html__( 'Box Shadow', 'prelude' ),
				'type' => 'checkbox',
				'active_callback' => 'prelude_cac_has_boxed_layout',
			),
		),
		array(
			'id' => 'site_layout_wrapper_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Wrapper Margin', 'prelude' ),
				'desc' => esc_html__( 'Top Right Bottom Left. Default: 30px 0px 30px 0px.', 'prelude' ),
				'active_callback' => 'prelude_cac_has_boxed_layout',
			),
			'inline_css' => array(
				'target' => '.site-layout-boxed #wrapper',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'wrapper_background_color',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Outer Background Color', 'prelude' ),
				'type' => 'color',
				'active_callback' => 'prelude_cac_has_boxed_layout',
			),
			'inline_css' => array(
				'target' => '.site-layout-boxed #wrapper',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'wrapper_background_img',
			'control' => array(
				'label' => esc_html__( 'Outer Background Image', 'prelude' ),
				'type' => 'image',
				'active_callback' => 'prelude_cac_has_boxed_layout',
			),
		),
		array(
			'id' => 'wrapper_background_img_style',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Outer Background Image Style', 'prelude' ),
				'type'  => 'image',
				'type'  => 'select',
				'choices' => array(
					''             => esc_html__( 'Default', 'prelude' ),
					'cover'        => esc_html__( 'Cover', 'prelude' ),
					'center-top'        => esc_html__( 'Center Top', 'prelude' ),
					'fixed-top'    => esc_html__( 'Fixed Top', 'prelude' ),
					'fixed'        => esc_html__( 'Fixed Center', 'prelude' ),
					'fixed-bottom' => esc_html__( 'Fixed Bottom', 'prelude' ),
					'repeat'       => esc_html__( 'Repeat', 'prelude' ),
					'repeat-x'     => esc_html__( 'Repeat-x', 'prelude' ),
					'repeat-y'     => esc_html__( 'Repeat-y', 'prelude' ),
				),
				'active_callback' => 'prelude_cac_has_boxed_layout',
			),
		),
	),
);

// Layout Position
$this->sections['prelude_layout_position'] = array(
	'title' => esc_html__( 'Layout Position', 'prelude' ),
	'panel' => 'prelude_layout',
	'settings' => array(
		array(
			'id' => 'site_layout_position',
			'default' => 'sidebar-right',
			'control' => array(
				'label' => esc_html__( 'Site Layout Position', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'prelude' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'prelude' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'prelude' ),
				),
				'desc' => esc_html__( 'Specify layout for all pages on website. (e.g. pages, blog posts, single post, archives, etc ). Single page can override this setting in Page Settings metabox when edit.', 'prelude' )
			),
		),
		array(
			'id' => 'single_post_layout_position',
			'default' => 'sidebar-right',
			'control' => array(
				'label' => esc_html__( 'Single Post Layout Position', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'prelude' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'prelude' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'prelude' ),
				),
				'desc' => esc_html__( 'Specify layout for all single post pages.', 'prelude' )
			),
		),
	),
);

// Layout Widths
$this->sections['prelude_layout_widths'] = array(
	'title' => esc_html__( 'Layout Widths', 'prelude' ),
	'panel' => 'prelude_layout',
	'settings' => array(
		array(
			'id' => 'site_desktop_container_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Container', 'prelude' ),
				'type' => 'text',
				'desc' => esc_html__( 'Default: 1170px', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array( 
					'.site-layout-full-width .prelude-container',
					'.site-layout-boxed #page'
				),
				'alter' => 'width',
			),
		),
		array(
			'id' => 'left_container_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Content', 'prelude' ),
				'type' => 'text',
				'desc' => esc_html__( 'Example: 66%', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#site-content',
				'alter' => 'width',
			),
		),
		array(
			'id' => 'sidebar_width',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Sidebar', 'prelude' ),
				'type' => 'text',
				'desc' => esc_html__( 'Example: 28%', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#sidebar',
				'alter' => 'width',
			),
		),
	),
);