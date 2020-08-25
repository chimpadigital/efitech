<?php
/**
 * Accent color
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'Prelude_Accent_Color' ) ) {
	class Prelude_Accent_Color {
		// Main constructor
		public function __construct() {
			add_filter( 'prelude_custom_colors_css', array( 'Prelude_Accent_Color', 'generate' ), 1 );
		}

		// Generates arrays of elements to target
		private static function arrays( $return ) {
			// Color
			$texts = apply_filters( 'prelude_accent_texts', array(
				'.text-accent-color',
				'.link-dark:hover',
				'.link-gray:hover',
				'.sticky-post',
				'#site-logo .site-logo-text:hover',
				'#main-nav .sub-menu li a:hover',
				'#main-nav .sub-menu li a:before',
				'.header-style-1 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-1 #site-header .header-search-trigger:hover',
				'.header-style-2 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-2 #site-header .header-search-trigger:hover',
				'.header-style-3 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-3 #site-header .header-search-trigger:hover',
				'.header-style-4 #site-header .nav-top-cart-wrapper .nav-cart-trigger:hover',
				'.header-style-4 #site-header .header-search-trigger:hover',
				'.top-bar-style-1 #top-bar .top-bar-content .content a:hover',
				'.top-bar-style-1 #top-bar .top-bar-socials .icons a:hover',
				'#featured-title #breadcrumbs a:hover',
				'.hentry .page-links span',
				'.hentry .page-links a span',
				'.hentry .post-title a:hover',
				'.hentry .post-meta .item.post-by-author .name:hover',
				'.hentry .post-link a',
				'.hentry .post-tags:before',
				'.hentry .post-tags a:hover',
				'.hentry .post-author .author-socials .socials a',
				'.related-news .related-title',
				'.related-news .post-item .post-categories a:hover',
				'.related-news .post-item .text-wrap h3 a:hover',
				'.related-news .related-post .slick-next:hover:before',
				'.related-news .related-post .slick-prev:hover:before',
				'.comment-reply a',
				'#cancel-comment-reply-link',
				'.comment-edit-link',
				'.logged-in-as a',
				'.widget.widget_archive ul li a:hover',
				'.widget.widget_categories ul li a:hover',
				'.widget.widget_meta ul li a:hover',
				'.widget.widget_nav_menu ul li a:hover',
				'.widget.widget_pages ul li a:hover',
				'.widget.widget_recent_entries ul li a:hover',
				'.widget.widget_recent_comments ul li a:hover',
				'.widget.widget_rss ul li a:hover',
				'#sidebar .widget.widget_calendar caption',
				'.widget.widget_nav_menu .menu > li.current-menu-item > a',
				'.widget.widget_nav_menu .menu > li.current-menu-item',
				'#sidebar .widget.widget_calendar tbody #today',
				'#sidebar .widget.widget_calendar tbody #today a',
				'#sidebar .widget_information ul li.accent-icon i',
				'#sidebar .widget.widget_recent_posts h3 a:hover',
				'#bottom .bottom-bar-copyright a:hover',

				// shortcodes
				'.prelude-accordions .accordion-item.accent .accordion-heading:hover',
				'.prelude-step-box .number-box .number',
				'.prelude-links.link-style-1.accent',
				'.prelude-links.link-style-2.accent',
				'.prelude-links.link-style-2.accent > span:before',
				'.prelude-links.link-style-3.accent',
				'.prelude-links.link-style-4.accent',
				'.prelude-arrow.hover-accent:hover',
				'.prelude-button.outline.outline-accent',
				'.prelude-button.outline.outline-accent .icon',
				'.prelude-counter .icon.accent',
				'.prelude-counter .prefix.accent',
				'.prelude-counter .suffix.accent',
				'.prelude-counter .number.accent',
				'.prelude-divider.has-icon .icon-wrap > span.accent',
				'.prelude-single-heading .heading.accent',
				'.prelude-headings .heading.accent',
				'.prelude-icon.accent > .icon',
				'.prelude-image-box.style-1 .item .title a:hover',
				'.prelude-image-box.style-3 .item .title a:hover',
				'.prelude-images-grid .cbp-nav-next:hover:after',
				'.prelude-images-grid .cbp-nav-prev:hover:after',
				'.prelude-images-grid .zoom-popup:hover:after',
				'.project-box.style-2 .project-image .text .terms a:hover',
				'.project-related-wrap .title-wrap .pre-title',
				'.project-related-wrap .btn-wrap a',
				'.project-related-wrap .project-item .cat a',
				'.project-related-wrap .project-item h2 a:hover',
				'.prelude-progress .perc.accent',
				'.prelude-list .icon.accent',

				 // Woocommerce
				'.woocommerce-page .woocommerce-MyAccount-content .woocommerce-info .button',
				'.products li .product-info .button',
				'.products li .product-info .added_to_cart',
				'.products li .product-cat:hover',
				'.products li h2:hover',
				'.product_list_widget .product-title:hover',
				'.widget_recent_reviews .product_list_widget a:hover',
				'.widget_product_categories ul li a:hover',
				'.widget.widget_product_search .woocommerce-product-search .search-submit:hover:before',
				'.widget_shopping_cart_content ul li a:hover',

				 // Default Link
				 'a',
			) );

			// Background color
			$backgrounds = apply_filters( 'prelude_accent_backgrounds', array(
				'blockquote:before',
				'button, input[type="button"], input[type="reset"], input[type="submit"]',
				'bg-accent',
				'.tparrows.custom:hover',
				'.nav-top-cart-wrapper .shopping-cart-items-count',
				'.header-btn-1 #site-header .header-button a',
				'.post-media .slick-prev:hover',
				'.post-media .slick-next:hover',
				'.post-media .slick-dots li.slick-active button',
				'.comment-reply a:after',
				'#cancel-comment-reply-link:after',
				'.widget.widget_search .search-form .search-submit',
				'.widget_mc4wp_form_widget .mc4wp-form .submit-wrap button',
				'.widget.widget_socials .socials a:hover',
				'#sidebar .widget.widget_recent_posts .recent-news .thumb.icon',
				'#sidebar .widget.widget_tag_cloud .tagcloud a:hover',
				'.widget_product_tag_cloud .tagcloud a:hover',
				'.footer-promotion .btn a',
				'#scroll-top:hover:before',
				'.prelude-pagination ul li .page-numbers:hover',
				'.woocommerce-pagination .page-numbers li .page-numbers:hover',
				'.prelude-pagination ul li .page-numbers.current',
				'.woocommerce-pagination .page-numbers li .page-numbers.current',
				'.no-results-content .search-form .search-submit:before',

				// shortcodes
				'.prelude-accordions .accordion-item.accent.active .accordion-heading',
				'.prelude-step-box .number-box:hover .number',
				'.prelude-links.link-style-1.accent > span:after',
				'.prelude-links.link-style-3.accent > span:after',
				'.prelude-button.accent',
				'.prelude-button.outline.outline-accent:hover',
				'.prelude-content-box > .inner.accent',
				'.prelude-content-box > .inner.dark-accent',
				'.prelude-content-box > .inner.light-accent',
				'.prelude-single-heading .line.accent',
				'.prelude-headings .sep.accent',
				'.prelude-headings .heading > span',
				'.prelude-icon.accent-bg > .icon',
				'.prelude-image-box.style-3.has-number:hover .number',
				'.prelude-share-social li a:hover',
				'#project-filter .cbp-filter-item > span:after',
				'.project-box.style-2 .project-image .text:before',
				'.project-related-wrap .btn-wrap a:hover',
				'.prelude-progress .progress-animate.accent',
				'.prelude-images-carousel.has-borders:after',
				'.prelude-images-carousel.has-borders:before',
				'.prelude-images-carousel.has-arrows.arrow-bottom .owl-nav',
				'.prelude-team .socials li a:hover',
				'.prelude-team-grid .socials li a:hover',
				'.bullet-accent .flickity-page-dots .dot',
				'.arrow-accent .flickity-button',
				'.prelude-video-icon.accent a',
				'.prelude-video-icon.green a',

				// woocemmerce
				'.woocommerce-page .woo-single-post-class .summary .stock.in-stock',
				'.product .onsale',
				'.woocommerce-page .shop_table.cart .coupon #coupon_code + button[type="submit"]',
				'.woocommerce-page .shop_table.cart .coupon + button[type="submit"]',
				'.woocommerce-page .wc-proceed-to-checkout .button',
				'.woocommerce-page .return-to-shop a',
				'#payment #place_order',
				'.widget_price_filter .price_slider_amount .button:hover',
				'.widget_shopping_cart_content .buttons a.checkout',
			) );

			// Border color
			$borders = apply_filters( 'prelude_accent_borders', array(
				'.underline-solid:after, .underline-dotted:after, .underline-dashed:after' => array( 'bottom' ),
				'#main-nav > ul > li:before' => array( 'bottom' ),
				'.widget.widget_links ul li a:after' => array( 'bottom' ),
				'.widget.widget_search .search-form .search-field:focus',
				'.widget_mc4wp_form_widget .mc4wp-form .email-wrap input:focus',
				'.widget.widget_socials .socials a:hover',
				'#sidebar .widget.widget_tag_cloud .tagcloud a:hover',
				'.widget_product_tag_cloud .tagcloud a:hover',
				'.no-results-content .search-form .search-field:focus',

				// shortcodes
				'.prelude-accordions .accordion-item.accent.active .accordion-heading',
				'.prelude-step-box .number-box .number',
				'.prelude-button.outline.outline-accent',
				'.prelude-button.outline.outline-accent:hover',
				'.divider-icon-before.accent',
				'.divider-icon-after.accent',
				'.prelude-divider.has-icon .divider-double.accent',
				'.prelude-image-box.style-2 .item .thumb:after' => array( 'bottom' ),
				'.prelude-share-social li a:hover',

				// woocommerce
				'.woo-single-post-class .summary .cart .quantity input',
				'.widget_price_filter .ui-slider .ui-slider-handle',
			) );

			// Gradient color
			$gradients = apply_filters( 'prelude_accent_gradient', array(
				'.prelude-progress .progress-animate.accent.gradient'
			) );

			// Return array
			if ( 'texts' == $return ) {
				return $texts;
			} elseif ( 'backgrounds' == $return ) {
				return $backgrounds;
			} elseif ( 'borders' == $return ) {
				return $borders;
			} elseif ( 'gradients' == $return ) {
				return $gradients;
			}
		}

		// Generates the CSS output
		public static function generate( $output ) {

			// Get custom accent
			$default_accent = '#00d664';
			$custom_accent  = prelude_get_mod( 'accent_color' );

			// Return if accent color is empty or equal to default
			if ( ! $custom_accent || ( $default_accent == $custom_accent ) )
				return $output;

			// Define css var
			$css = '';

			// Get arrays
			$texts       = self::arrays( 'texts' );
			$backgrounds = self::arrays( 'backgrounds' );
			$borders     = self::arrays( 'borders' );
			$gradients    = self::arrays( 'gradients' );

			// Texts
			if ( ! empty( $texts ) )
				$css .= implode( ',', $texts ) .'{color:'. $custom_accent .';}';

			// Backgrounds
			if ( ! empty( $backgrounds ) )
				$css .= implode( ',', $backgrounds ) .'{background-color:'. $custom_accent .';}';

			// Borders
			if ( ! empty( $borders ) ) {
				foreach ( $borders as $key => $val ) {
					if ( is_array( $val ) ) {
						$css .= $key .'{';
						foreach ( $val as $key => $val ) {
							$css .= 'border-'. $val .'-color:'. $custom_accent .';';
						}
						$css .= '}'; 
					} else {
						$css .= $val .'{border-color:'. $custom_accent .';}';
					}
				}
			}

			// Gradients
			if ( ! empty( $gradients ) )
				$css .= implode( ',', $gradients ) .'{background: '. prelude_hex2rgba($custom_accent, 1) .';background: -moz-linear-gradient(left, '. prelude_hex2rgba($custom_accent, 1) .' 0%, '. prelude_hex2rgba($custom_accent, 0.3) .' 100%);background: -webkit-linear-gradient( left, '. prelude_hex2rgba($custom_accent, 1) .' 0%, '. prelude_hex2rgba($custom_accent, 0.3) .' 100% );background: linear-gradient(to right, '. prelude_hex2rgba($custom_accent, 1) .' 0%, '. prelude_hex2rgba($custom_accent, 0.3) .' 100%) !important;}';

			// Return CSS
			if ( ! empty( $css ) )
				$output .= '/*ACCENT COLOR*/'. $css;

			// Return output css
			return $output;
		}
	}
}

new Prelude_Accent_Color();