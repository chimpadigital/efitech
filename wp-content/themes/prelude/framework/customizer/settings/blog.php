<?php
/**
 * Blog setting for Customizer
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Blog Posts General
$this->sections['prelude_blog_post'] = array(
	'title' => esc_html__( 'General', 'prelude' ),
	'panel' => 'prelude_blog',
	'settings' => array(
		array(
			'id' => 'blog_featured_title',
			'default' => esc_html__( 'Latest news', 'prelude' ),
			'control' => array(
				'label' => esc_html__( 'Blog Featured Title', 'prelude' ),
				'type' => 'text',
			),
		),
		array(
			'id' => 'blog_entry_content_background',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Entry Content Background Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.post-content-wrap',
				'alter' => 'background-color',
			),
		),
		array(
			'id' => 'blog_entry_content_padding',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Entry Content Padding', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'padding',
			),
		),
		array(
			'id' => 'blog_entry_bottom_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Entry Bottom Margin', 'prelude' ),
				'description' => esc_html__( 'Example: 30px.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry',
				'alter' => 'margin-top',
			),
		),
		array(
			'id' => 'blog_entry_border_width',
			'transport' => 'postMessage',
			'control' => array (
				'type' => 'text',
				'label' => esc_html__( 'Entry Border Width', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0px 2px 0px 0px', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'border-width',
			),
		),
		array(
			'id' => 'blog_entry_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Entry Border Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-wrap',
				'alter' => 'border-color',
			),
		),
		array(
			'id' => 'blog_entry_composer',
			'default' => 'meta,title,excerpt_content,readmore',
			'control' => array(
				'label' => esc_html__( 'Entry Content Elements', 'prelude' ),
				'type' => 'prelude-sortable',
				'object' => 'Prelude_Customize_Control_Sorter',
				'choices' => array(
					'meta'            => esc_html__( 'Meta', 'prelude' ),
					'title'           => esc_html__( 'Title', 'prelude' ),
					'excerpt_content' => esc_html__( 'Excerpt', 'prelude' ),
					'readmore'        => esc_html__( 'Read More', 'prelude' ),

				),
				'desc' => esc_html__( 'Drag and drop elements to re-order.', 'prelude' ),
			),
		),
	),
);

// Blog Posts Title
$this->sections['prelude_blog_post_title'] = array(
	'title' => esc_html__( 'Blog Post - Title', 'prelude' ),
	'panel' => 'prelude_blog',
	'settings' => array(
		array(
			'id' => 'blog_title_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Margin', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-title',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'blog_title_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'.hentry .post-title a',
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_title_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color Hover', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-title a:hover',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Meta
$this->sections['prelude_blog_post_meta'] = array(
	'title' => esc_html__( 'Blog Post - Meta', 'prelude' ),
	'panel' => 'prelude_blog',
	'settings' => array(
		array(
			'id' => 'blog_entry_meta_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Meta Margin', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0 0 20px 0.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta',
				'alter' => 'margin',
			),
		),
		array(
			'id'  => 'blog_entry_meta_items',
			'default' => array( 'author', 'date' ),
			'control' => array(
				'label' => esc_html__( 'Meta Items', 'prelude' ),
				'desc' => esc_html__( 'Click and drag and drop elements to re-order them.', 'prelude' ),
				'type' => 'prelude-sortable',
				'object' => 'Prelude_Customize_Control_Sorter',
				'choices' => array(
					'author'     => esc_html__( 'Author', 'prelude' ),
					'date'       => esc_html__( 'Date', 'prelude' ),
				),
			),
		),
		array(
			'id' => 'heading_blog_entry_meta_item',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Item Meta', 'prelude' ),
			),
		),
		array(
			'id' => 'blog_entry_meta_item_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_entry_meta_item_link_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_entry_meta_item_link_color_hover',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Link Color Hover', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-meta .item a:hover',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Excerpt
$this->sections['prelude_blog_post_excerpt'] = array(
	'title' => esc_html__( 'Blog Post - Excerpt', 'prelude' ),
	'panel' => 'prelude_blog',
	'settings' => array(
		array(
			'id' => 'blog_content_style',
			'default' => 'style-1',
			'control' => array(
				'label' => esc_html__( 'Content Style', 'prelude' ),
				'type' => 'select',
				'choices' => array(
					'style-1' => esc_html__( 'Normal', 'prelude' ),
					'style-2' => esc_html__( 'Excerpt', 'prelude' ),
				),
			),
		),
		array(
			'id' => 'blog_excerpt_length',
			'default' => '50',
			'control' => array(
				'label' => esc_html__( 'Excerpt length', 'prelude' ),
				'type' => 'text',
				'desc' => esc_html__( 'This option only apply for Content Style: Excerpt.', 'prelude' )
			),
		),
		array(
			'id' => 'blog_excerpt_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Margin', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left. Example: 0 0 30px 0.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-excerpt',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'blog_excerpt_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-excerpt',
				'alter' => 'color',
			),
		),
	),
);

// Blog Posts Read More
$this->sections['prelude_blog_post_read_more'] = array(
	'title' => esc_html__( 'Blog Post - Read More', 'prelude' ),
	'panel' => 'prelude_blog',
	'settings' => array(
		array(
			'id' => 'blog_entry_button_read_more_text',
			'default' => esc_html__( 'Read More', 'prelude' ),
			'control' => array(
				'label' => esc_html__( 'Button Text', 'prelude' ),
				'type' => 'text',
			),
		),
	),
);

