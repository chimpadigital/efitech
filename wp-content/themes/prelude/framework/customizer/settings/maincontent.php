<?php
/**
 * Main Content setting for Customizer
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Main Content General
$this->sections['prelude_maincontent_general'] = array(
	'title' => esc_html__( 'General', 'prelude' ),
	'panel' => 'prelude_maincontent',
	'settings' => array(
		array(
			'id' => 'main_content_top_padding',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Top Padding', 'prelude' ),
				'description' => esc_html__( 'Example: 30px', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#main-content',
				'alter' => 'padding-top',
			),
		),
		array(
			'id' => 'main_content_bottom_padding',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Bottom Padding', 'prelude' ),
				'description' => esc_html__( 'Example: 30px', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#main-content, .footer-has-subs #main-content',
				'alter' => 'padding-bottom',
			),
		),
		array(
			'id' => 'main_content_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#main-content',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'main_content_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'prelude' ),
			),
		),
		array(
			'id' => 'main_content_background_img_style',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Background Image Style', 'prelude' ),
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
			),
		),
	),
);

// Main Content Left
$this->sections['prelude_maincontent_left'] = array(
	'title' => esc_html__( 'Content', 'prelude' ),
	'panel' => 'prelude_maincontent',
	'settings' => array(
		array(
			'id' => 'left_content_padding',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 30px', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#inner-content',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'left_content_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#inner-content',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'left_content_border_width',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0px 2px 0px 0px', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#inner-content:after',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'left_content_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#inner-content:after',
				'alter' => 'border-color',
			),
		),
	),
);

// Main Content Right
$this->sections['prelude_maincontent_right'] = array(
	'title' => esc_html__( 'Sidebar', 'prelude' ),
	'panel' => 'prelude_maincontent',
	'settings' => array(
		array(
			'id' => 'right_content_padding',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 30px', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.sidebar-left #sidebar, .sidebar-right #sidebar',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'right_content_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.sidebar-left #sidebar, .sidebar-right #sidebar',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'right_content_border_width',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Border Width', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0px 3px 3px 0px', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.sidebar-left #sidebar, .sidebar-right #sidebar',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'right_content_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Border Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.sidebar-left #sidebar, .sidebar-right #sidebar',
				'alter' => 'border-color',
			),
		),
	),
);