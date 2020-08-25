<?php
/**
 * Footer setting for Customizer
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Footer General
$this->sections['prelude_footer_general'] = array(
	'title' => esc_html__( 'General', 'prelude' ),
	'panel' => 'prelude_footer',
	'settings' => array(
		array(
			'id' => 'footer_columns',
			'default' => '4',
			'control' => array(
				'label' => esc_html__( 'Footer Column(s)', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'5' => '5',
					'4' => '4',
					'3' => '3',
					'2' => '2',
					'1' => '1',
				),
			),
		),
		array(
			'id' => 'footer_column_gutter',
			'default' => '30',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Footer Column Gutter', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'5'    => '5px',
					'10'   => '10px',
					'15'   => '15px',
					'20'   => '20px',
					'25'   => '25px',
					'30'   => '30px',
					'35'   => '35px',
					'40'   => '40px',
					'45'   => '45px',
					'50'   => '50px',
					'60'   => '60px',
					'70'   => '70px',
					'80'   => '80px',
				),
				'active_callback' => 'prelude_cac_has_footer_simple',
			),
		),
		array(
			'id' => 'footer_text_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#footer-widgets .widget',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'footer_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#footer',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'footer_bg_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'prelude' ),
			),
		),
		array(
			'id' => 'footer_bg_img_style',
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
		array(
			'id' => 'footer_top_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Top Padding', 'prelude' ),
				'description' => esc_html__( 'Example: 60px.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#footer',
				'alter' => 'padding-top',
			),
		),
		array(
			'id' => 'footer_bottom_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Bottom Padding', 'prelude' ),
				'description' => esc_html__( 'Example: 60px.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '#footer',
				'alter' => 'padding-bottom',
			),
		),
	),
);

// Pre-Footer
$this->sections['prelude_footer_promotion'] = array(
	'title' => esc_html__( 'Pre-Footer Area', 'prelude' ),
	'panel' => 'prelude_footer',
	'settings' => array(
		array(
			'id' => 'pre_footer_type',
			'default' => '',
			'control' => array(
				'label'  => esc_html__( 'Pre-Footer Type', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'' => esc_html__( 'Disable', 'prelude' ),
					'promo' => esc_html__( 'Promotion', 'prelude' ),
					'subs' => esc_html__( 'Subscribe', 'prelude' ),
				),
			),
		),
		// Promotion
		array(
			'id' => 'promo_subheading',
			'default' => esc_html__( 'LET\'S GET STARTED YOUR PROJECT WITH PROFESSIONAL WAY', 'prelude' ),
			'control' => array(
				'label' => esc_html__( 'Sub-Heading', 'prelude' ),
				'type' => 'prelude_textarea',
				'rows' => 3,
				'active_callback' => 'prelude_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_heading',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Heading', 'prelude' ),
				'type' => 'prelude_textarea',
				'rows' => 3,
				'active_callback' => 'prelude_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_button',
			'default' => esc_html__( 'Contact Us', 'prelude' ),
			'control' => array(
				'label' => esc_html__( 'Button', 'prelude' ),
				'type' => 'text',
				'active_callback' => 'prelude_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_button_url',
			'default' => esc_html__( '#', 'prelude' ),
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Button URL', 'prelude' ),
				'description' => esc_html__( 'Please \'http://\' included', 'prelude' ),
				'active_callback' => 'prelude_cac_has_footer_promo',
			),	
		),
		array(
			'id' => 'promo_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'prelude' ),
				'active_callback' => 'prelude_cac_has_footer_promo',
			),
			'inline_css' => array(
				'target' => '.footer-promotion',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'promo_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'prelude' ),
				'active_callback' => 'prelude_cac_has_footer_promo',
			),
		),
		array(
			'id' => 'promo_background_img_style',
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
				'active_callback' => 'prelude_cac_has_footer_promo',
			),
		),
		// Subscribe
		array(
			'id' => 'subscribe_heading',
			'default' => esc_html__( 'Subscribe to get the latest news', 'prelude' ),
			'control' => array(
				'label' => esc_html__( 'Heading', 'prelude' ),
				'type' => 'prelude_textarea',
				'rows' => 3,
				'active_callback' => 'prelude_cac_has_footer_subscribe',
			),
		),
		array(
			'id' => 'subscribe_subheading',
			'default' => esc_html__( 'By clicking subscribe, you are opting in to receive out updates', 'prelude' ),
			'control' => array(
				'label' => esc_html__( 'Heading', 'prelude' ),
				'type' => 'prelude_textarea',
				'rows' => 3,
				'active_callback' => 'prelude_cac_has_footer_subscribe',
			),
		),
		array(
			'id' => 'subscribe_bg',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background Color', 'prelude' ),
				'active_callback' => 'prelude_cac_has_footer_subscribe',
			),
			'inline_css' => array(
				'target' => '.footer-subscribe',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'subscribe_bg_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'prelude' ),
				'active_callback' => 'prelude_cac_has_footer_subscribe',
			),
		),
		array(
			'id' => 'subscribe_bg_img_style',
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
				'active_callback' => 'prelude_cac_has_footer_subscribe',
			),
		),
	),
);

