<?php
/**
 * Bottom Bar setting for Customizer
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Bottom Bar General
$this->sections['prelude_bottombar_general'] = array(
	'title' => esc_html__( 'General', 'prelude' ),
	'panel' => 'prelude_bottombar',
	'settings' => array(
		array(
			'id' => 'bottom_bar',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable', 'prelude' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'bottom_bar_style',
			'default' => 'style-1',
			'control' => array(
				'label' => esc_html__( 'Style', 'prelude' ),
				'type' => 'select',
				'active_callback' => 'prelude_cac_has_bottombar',
				'choices' => array(
					'style-1' => esc_html__( 'Centered Content', 'prelude' ),
					'style-2' => esc_html__( 'Content & Navigation', 'prelude' ),
				),
			),
		),
		array(
			'id' => 'bottom_copyright',
			'transport' => 'postMessage',
			'default' => '&copy; Prelude - Creative Multipurpose WordPress Theme.',
			'control' => array(
				'label' => esc_html__( 'Copyright', 'prelude' ),
				'type' => 'prelude_textarea',
				'active_callback' => 'prelude_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_padding',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'text',
				'label' => esc_html__( 'Padding', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'prelude' ),
				'active_callback'=> 'prelude_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom .bottom-bar-inner-wrap',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'bottom_background',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'prelude' ),
				'active_callback'=> 'prelude_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom',
				'alter' => 'background',
			),
		),
		array(
			'id' => 'bottom_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'prelude' ),
				'active_callback' => 'prelude_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_background_img_style',
			'default' => 'repeat',
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
				'active_callback' => 'prelude_cac_has_bottombar',
			),
		),
		array(
			'id' => 'bottom_color',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'prelude' ),
				'active_callback'=> 'prelude_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'line_color',
			'transport' => 'postMessage',
			'control' =>  array(
				'type' => 'color',
				'label' => esc_html__( 'Line Color', 'prelude' ),
				'active_callback'=> 'prelude_cac_has_bottombar',
			),
			'inline_css' => array(
				'target' => '#bottom .bottom-bar-inner-wrap:before',
				'alter' => 'background-color',
			),
		),
	),
);