<?php
/**
 * Top Bar setting for Customizer
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Top Bar 1 General
$this->sections['prelude_topbar_general_one'] = array(
	'title' => esc_html__( 'General', 'prelude' ),
	'panel' => 'prelude_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_one_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar:after',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'top_bar_one_background_opacity',
			'transport' => 'postMessage',
			'default' => '1',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar_one',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'prelude' ),
					'0.9' => esc_html__( '0.9', 'prelude' ),
					'0.8' => esc_html__( '0.8', 'prelude' ),
					'0.7' => esc_html__( '0.7', 'prelude' ),
					'0.6' => esc_html__( '0.6', 'prelude' ),
					'0.5' => esc_html__( '0.5', 'prelude' ),
					'0.4' => esc_html__( '0.4', 'prelude' ),
					'0.3' => esc_html__( '0.3', 'prelude' ),
					'0.2' => esc_html__( '0.2', 'prelude' ),
					'0.1' => esc_html__( '0.1', 'prelude' ),
					'0.0001' => esc_html__( '0', 'prelude' ),
				),
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'top_bar_one_text',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_one_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_one_social_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Socials: Color', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar_one',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-1 #top-bar .top-bar-socials .icons a',
				'alter' => 'color',
			),
		),
	),
);

// Top Bar 2 General
$this->sections['prelude_topbar_general_two'] = array(
	'title' => esc_html__( 'General', 'prelude' ),
	'panel' => 'prelude_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_two_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Background', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar:after',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'top_bar_two_background_opacity',
			'transport' => 'postMessage',
			'default' => '1',
			'control' => array(
				'label'  => esc_html__( 'Background Opacity', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar_two',
				'type' => 'select',
				'choices' => array(
					'1' => esc_html__( '1', 'prelude' ),
					'0.9' => esc_html__( '0.9', 'prelude' ),
					'0.8' => esc_html__( '0.8', 'prelude' ),
					'0.7' => esc_html__( '0.7', 'prelude' ),
					'0.6' => esc_html__( '0.6', 'prelude' ),
					'0.5' => esc_html__( '0.5', 'prelude' ),
					'0.4' => esc_html__( '0.4', 'prelude' ),
					'0.3' => esc_html__( '0.3', 'prelude' ),
					'0.2' => esc_html__( '0.2', 'prelude' ),
					'0.1' => esc_html__( '0.1', 'prelude' ),
					'0.0001' => esc_html__( '0', 'prelude' ),
				),
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar:after',
				'alter' => 'opacity',
			),
		),
		array(
			'id' => 'top_bar_two_text',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_two_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'top_bar_two_social_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Socials: Color', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar_two',
			),
			'inline_css' => array(
				'target' => '.top-bar-style-2 #top-bar .top-bar-socials .icons a',
				'alter' => 'color',
			),
		),
	),
);

// Top Bar Content
$this->sections['prelude_topbar_content'] = array(
	'title' => esc_html__( 'Content', 'prelude' ),
	'panel' => 'prelude_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_content_phone',
			'default' => '+1 212 946 2700',
			'control' => array(
				'label' => esc_html__( 'Phone', 'prelude' ),
				'type' => 'prelude_textarea',
				'rows' => 3,
				'active_callback' => 'prelude_cac_has_topbar',
			),
		),
		array(
			'id' => 'top_bar_content_email',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Email', 'prelude' ),
				'type' => 'prelude_textarea',
				'rows' => 3,
				'active_callback' => 'prelude_cac_has_topbar',
			),
		),
		array(
			'id' => 'top_bar_content_address',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Address', 'prelude' ),
				'type' => 'prelude_textarea',
				'rows' => 3,
				'active_callback' => 'prelude_cac_has_topbar',
			),
		),
	),
);

// Top Bar Socials
$this->sections['prelude_topbar_social'] = array(
	'title' => esc_html__( 'Social', 'prelude' ),
	'panel' => 'prelude_topbar',
	'settings' => array(
		array(
			'id' => 'top_bar_social_text',
			'default' => '',
			'control' => array(
				'label' => esc_html__( 'Text', 'prelude' ),
				'type' => 'prelude_textarea',
				'rows' => 3,
				'active_callback' => 'prelude_cac_has_topbar',
			),
		),
		array(
			'id' => 'top_bar_social_font_size',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Icon Size', 'prelude' ),
				'description' => esc_html__( 'Example: 20px.', 'prelude' ),
				'active_callback' => 'prelude_cac_has_topbar',
			),
			'inline_css' => array(
				'target' => '#top-bar .top-bar-socials .icons a',
				'alter' => 'font-size',
			),
		),
	),
);

// Social settings
$social_options = prelude_topbar_social_options();
foreach ( $social_options as $key => $val ) {
	$this->sections['prelude_topbar_social']['settings'][] = array(
		'id' => 'top_bar_social_profiles[' . $key .']',
		'control' => array(
			'label' => $val['label'],
			'type' => 'text',
			'active_callback' => 'prelude_cac_has_topbar',
		),
	);
}

// Remove var from memory
unset( $social_options );