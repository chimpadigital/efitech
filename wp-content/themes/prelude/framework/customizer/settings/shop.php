<?php
/**
 * Shop setting for Customizer
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Main Shop
$this->sections['prelude_shop_general'] = array(
	'title' => esc_html__( 'Main Shop', 'prelude' ),
	'panel' => 'prelude_shop',
	'settings' => array(
		array(
			'id' => 'shop_layout_position',
			'default' => 'no-sidebar',
			'control' => array(
				'label' => esc_html__( 'Shop Layout Position', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'prelude' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'prelude' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'prelude' ),
				),
				'desc' => esc_html__( 'Specify layout for main shop page.', 'prelude' ),
				'active_callback' => 'prelude_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_featured_title',
			'default' => esc_html__( 'Our Shop', 'prelude' ),
			'control' => array(
				'label' => esc_html__( 'Shop: Featured Title', 'prelude' ),
				'type' => 'prelude_textarea',
				'active_callback' => 'prelude_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Shop: Featured Title Background', 'prelude' ),
				'active_callback' => 'prelude_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_products_per_page',
			'default' => 6,
			'control' => array(
				'label' => esc_html__( 'Products Per Page', 'prelude' ),
				'type' => 'number',
				'active_callback' => 'prelude_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_columns',
			'default' => '3',
			'control' => array(
				'label' => esc_html__( 'Shop Columns', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'active_callback' => 'prelude_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_item_bottom_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Item Bottom Margin', 'prelude' ),
				'description' => esc_html__( 'Example: 30px.', 'prelude' ),
				'active_callback' => 'prelude_cac_has_woo',
			),
			'inline_css' => array(
				'target' => '.products li',
				'alter' => 'margin-top',
			),
		),
	),
);

// Single Shop
$this->sections['prelude_single_shop_general'] = array(
	'title' => esc_html__( 'Single Shop', 'prelude' ),
	'panel' => 'prelude_shop',
	'settings' => array(
		array(
			'id' => 'shop_single_layout_position',
			'default' => 'no-sidebar',
			'control' => array(
				'label' => esc_html__( 'Shop Single Layout Position', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'sidebar-right' => esc_html__( 'Right Sidebar', 'prelude' ),
					'sidebar-left'  => esc_html__( 'Left Sidebar', 'prelude' ),
					'no-sidebar'    => esc_html__( 'No Sidebar', 'prelude' ),
				),
				'desc' => esc_html__( 'Specify layout on the shop single page.', 'prelude' ),
				'active_callback' => 'prelude_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_single_featured_title',
			'default' => esc_html__( 'Our Shop', 'prelude' ),
			'control' => array(
				'label' => esc_html__( 'Shop Single: Featured Title', 'prelude' ),
				'type' => 'text',
				'active_callback' => 'prelude_cac_has_woo',
			),
		),
		array(
			'id' => 'shop_single_featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Shop Single: Featured Title Background', 'prelude' ),
				'active_callback' => 'prelude_cac_has_woo',
			),
		),
	),
);