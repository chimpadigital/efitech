<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

$data = $cls = $css = $title_css = $text_css = $thumb_css = '';
$inner_css = $inner_html = $image_html = $title_html = $text_html = $name_html = $position_html = '';

extract( shortcode_atts( array(
	'image' => '',
	'image_width' => '',
	'title' => '',
	'title_color' => '',
	'text_color' => '',
	'wrap_background' => '',
	'wrap_padding' => '',
	'wrap_rounded' => '',
    'animation' => '',
    'animation_effect' => 'fadeInUp',
    'animation_duration' => '0.75s',
    'animation_delay' => '0.3s',
	'name' => 'JOHN ROE',
	'position' => 'Sale Manager',
	'title_font_family' => 'Default',
	'title_font_weight' => 'Default',
	'title_font_size' => '',
	'title_line_height' => '',	
	'text_font_family' => 'Default',
	'text_font_weight' => 'Default',
	'text_font_size' => '',
	'text_font_style' => 'normal',
	'text_line_height' => '',
	'title_margin' => '',
	'text_margin' => '',
), $atts ) );
$content = wpb_js_remove_wpautop($content, true);

if ( $title ) {
	if ( $title_font_weight != 'Default' ) $title_css .= 'font-weight:'. $title_font_weight .';';
	if ( $title_color ) $title_css .= 'color: '. $title_color .';';
	if ( $title_font_size ) $title_css .= 'font-size:'. intval( $title_font_size ) .'px;';
	if ( $title_line_height ) $title_css .= 'line-height:'. intval( $title_line_height ) .'px;';
	if ( $title_font_family != 'Default' ) {
	    prelude_enqueue_google_font( $title_font_family );
	    $title_css .= 'font-family:'. $title_font_family .';';
	}

	if ( $title_margin ) $title_css .= 'margin:'. $title_margin .';';

    $title_html = sprintf( '<h4 class="title">%1$s</h4>', $title );
}

if ( $image ) {
	if ( $image_width ) $thumb_css .= 'max-width:'. intval( $image_width ) .'px;';
    $image_html = sprintf(
        '<div class="thumb" style="%2$s">%1$s</div>',
         wp_get_attachment_image( $image, 'full' ), $thumb_css
    );
}

if ( $content ) {
	$text_css .= 'font-style:'. $text_font_style .';';
	if ( $text_font_weight != 'Default' ) $text_css .= 'font-weight:'. $text_font_weight .';';
	if ( $text_color ) $text_css .= 'color: '. $text_color .';';
	if ( $text_font_size ) $text_css .= 'font-size:'. intval( $text_font_size ) .'px;';
	if ( $text_line_height ) $text_css .= 'line-height:'. intval( $text_line_height ) .'px;';
	if ( $text_font_family != 'Default' ) {
	    prelude_enqueue_google_font( $text_font_family );
	    $text_css .= 'font-family:'. $text_font_family .';';
	}

	if ( $text_margin ) $text_css .= 'margin:'. $text_margin .';';

	$text_html .= sprintf(
		'<div class="quote" style="%2$s">%1$s</div>',
		$content,
		$text_css
	);
}

if ( $name || $position ) {
	if ( $name ) {
	    $name_html = sprintf(
	    '<span class="name">%s</span>',
	    $name );
	}

	if ( $position ) {
	    $position_html = sprintf(
	    '<span class="position">%s</span>',
	    $position );
	}
}

if ( $wrap_background ) $inner_css .= 'background-color:'. $wrap_background .';';
if ( $wrap_padding ) $inner_css .= 'padding:'. $wrap_padding .';';
if ( $wrap_rounded ) $inner_css .= 'border-radius:'. intval( $wrap_rounded ) .'px;';

$inner_html = sprintf(
    '<div class="wrap" style="%6$s">
    	<div class="clearfix">
		    %1$s
		    <div class="name-pos-wrap">
		    	%4$s %5$s
		    </div>
	    </div>
	    <div class="text-wrap">
	    	%2$s %3$s
	    </div>
	    <div class="stars"></div>
    </div>',
    $image_html, $title_html, $text_html, $name_html, $position_html, $inner_css
);

if ( $animation ) {
    $cls .= ' wow '. $animation_effect;
    $data .= ' data-wow-duration="'. $animation_duration .'" data-wow-delay="'. $animation_delay .'"';
}

printf(
    '<div class="prelude-testimonials %3$s" style="%2$s" %4$s>
        %1$s
    </div>', 
    $inner_html,
    $css,
    $cls,
    $data
);