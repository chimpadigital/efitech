<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

extract( shortcode_atts( array(
    'style' => 'style-1',
    'title_width' => 'w190',
), $atts ) );
$content = wpb_js_remove_wpautop($content, true);

$cls = $style;

printf( '
	<div class="prelude-tabs clearfix %2$s"><div class="tab-title clearfix"></div><div class="tab-content-wrap">%1$s</div></div>',
	do_shortcode($content),
	$cls
);