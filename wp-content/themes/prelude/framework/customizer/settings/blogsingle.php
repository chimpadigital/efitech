<?php
/**
 * Blog Single setting for Customizer
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Blog Single General
$this->sections['prelude_blog_single_general'] = array(
	'title' => esc_html__( 'General', 'prelude' ),
	'panel' => 'prelude_blogsingle',
	'settings' => array(
		array(
			'id' => 'prelude_blog_single_featured_title',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Feature Title', 'prelude' ),
			),
		),
		array(
			'id' => 'blog_single_featured_title',
			'default' => esc_html__( 'Latest news', 'prelude' ),
			'control' => array(
				'label' => esc_html__( 'Title', 'prelude' ),
				'type' => 'text',
			),
		),
		array(
			'id' => 'blog_single_featured_title_background_img',
			'control' => array(
				'type' => 'image',
				'label' => esc_html__( 'Background Image', 'prelude' ),
				'active_callback' => 'prelude_cac_has_featured_title',
			),
		),
		array(
			'id' => 'prelude_blog_single_media_heading',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Media', 'prelude' ),
			),
		),
		array(
			'id' => 'blog_single_media',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable Post Media on Single Post', 'prelude' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'prelude_blog_single_meta_heading',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Meta', 'prelude' ),
			),
		),
		array(
			'id' => 'blog_single_meta',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable Post Meta on Single Post', 'prelude' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'blog_single_meta_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Meta Margin', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-single-wrap .post-meta',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'prelude_blog_single_title_heading',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Title', 'prelude' ),
			),
		),
		array(
			'id' => 'blog_single_title',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable Post Title on Single Post', 'prelude' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'blog_single_title_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Title Margin', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left. Default: 0 0 10px 0.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-content-single-wrap .post-title',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'blog_single_title_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Title Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'.hentry .post-content-single-wrap .post-title'
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'prelude_blog_single_tags_heading',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Tags', 'prelude' ),
			),
		),
		array(
			'id' => 'blog_single_tags',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable Post Tags on Single Post', 'prelude' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'prelude_blog_single_related_header',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Related Posts', 'prelude' ),
			),
		),
		array(
			'id' => 'prelude_blog_single_related',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Enable Related Posts on Single Post', 'prelude' ),
				'type' => 'checkbox',
			),
		),
	),
);

// Blog Single Post Author
$this->sections['prelude_blog_single_post_author'] = array(
	'title' => esc_html__( 'Blog Single Post - Author', 'prelude' ),
	'panel' => 'prelude_blogsingle',
	'settings' => array(
		array(
			'id' => 'blog_single_author_margin',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Margin', 'prelude' ),
				'description' => esc_html__( 'Top Right Bottom Left.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-author',
				'alter' => 'margin',
			),
		),
		array(
			'id' => 'blog_single_author_name_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Name Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-author .name',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_single_author_text_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-author .author-desc > p',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_single_author_avatar_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Image Width', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'.hentry .post-author .author-avatar',
					'.hentry .post-author .author-avatar a'
				),
				'alter' => 'width',
			),
		),
		array(
			'id' => 'blog_single_author_avatar_margin_right',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Image Right Margin', 'prelude' ),
				'description' => esc_html__( 'Example: 40px.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-author .author-avatar',
				'alter' => 'margin-right',
			),
		),
		array(
			'id' => 'blog_single_author_avatar_rounded',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Image Rounded', 'prelude' ),
				'description' => esc_html__( 'Example: 10px. 0px is square.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.hentry .post-author .author-avatar a, .hentry .post-author .author-avatar a img',
				'alter' => 'border-radius',
			),
		),
	),
);

// Blog Single Comment
$this->sections['prelude_blog_single_post_comment'] = array(
	'title' => esc_html__( 'Blog Single Post - Comment', 'prelude' ),
	'panel' => 'prelude_blogsingle',
	'settings' => array(
		array(
			'id' => 'heading_comment_title',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Title', 'prelude' ),
			),
		),
		array(
			'id' => 'blog_single_comment_title_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Title Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'.comments-area .comments-title',
					'.comments-area .comment-reply-title'
				),
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_single_comment_title_margin_bottom',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Title Bottom Margin', 'prelude' ),
			),
			'inline_css' => array(
				'target' => array(
					'.comments-area .comments-title',
					'.comments-area .comment-reply-title'
				),
				'alter' => 'margin-bottom',
			),
		),
		// Comment List
		array(
			'id' => 'heading_comment_list',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Comment List', 'prelude' ),
			),
		),
		array(
			'id' => 'blog_single_comment_avatar_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Avatar Width', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.comment-list article .gravatar',
				'alter' => 'width',
			),
		),
		array(
			'id' => 'blog_single_comment_avatar_margin_right',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Avatar Right Margin', 'prelude' ),
				'description' => esc_html__( 'Example: 30px.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.comment-list article .gravatar',
				'alter' => 'margin-right',
			),
		),
		array(
			'id' => 'blog_single_comment_avatar_rounded',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Avatar Rounded', 'prelude' ),
				'description' => esc_html__( 'Example: 10px. 0px is square.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.comment-list article .gravatar',
				'alter' => 'border-radius',
			),
		),
		array(
			'id' => 'blog_single_comment_article_margin_bottom',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Article Bottom Margin', 'prelude' ),
				'description' => esc_html__( 'Example: 40px.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.comment-list article',
				'alter' => 'margin-bottom',
			),
		),
		array(
			'id' => 'blog_single_comment_name_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Name Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.comment-author, .comment-author a',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_single_comment_time_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Date Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.comment-time',
				'alter' => 'color',
			),
		),
		array(
			'id' => 'blog_single_comment_text_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Text Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.comment-text',
				'alter' => 'color',
			),
		),
		// Comment Form
		array(
			'id' => 'heading_comment_form',
			'control' => array(
				'type' => 'prelude-heading',
				'label' => esc_html__( 'Comment Form', 'prelude' ),
			),
		),
		array(
			'id' => 'blog_single_comment_form_border_color',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'color',
				'label' => esc_html__( 'Form Border Color', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.name-wrap input, .email-wrap input, .message-wrap textarea',
				'alter' => 'border-color',
			),
		),
		array(
			'id' => 'blog_single_comment_form_rounded',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Form Rounded', 'prelude' ),
				'description' => esc_html__( 'Example: 3px. 0px is square.', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.name-wrap input, .email-wrap input, .message-wrap textarea',
				'alter' => 'border-radius',
			),
		),
		array(
			'id' => 'blog_single_comment_form_border_width',
			'transport' => 'postMessage',
			'control' => array(
				'type' => 'text',
				'label' => esc_html__( 'Form Border Width', 'prelude' ),
			),
			'inline_css' => array(
				'target' => '.name-wrap input, .email-wrap input, .message-wrap textarea',
				'alter' => 'border-width',
			),
		),
	),
);


