<?php
/**
 * Entry Content / Tags
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

if ( is_single() && ! prelude_get_mod( 'blog_single_tags', true ) )
	return;

$text = prelude_get_mod( 'blog_single_tags_text', '' );
the_tags( '<div class="post-tags clearfix">'. esc_html( $text ),', ','</div>' );


