<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

printf( '
	<div class="prelude-parallax-box"><div class="parallax-wrap">%1$s</div></div>',
	do_shortcode( $content )
);