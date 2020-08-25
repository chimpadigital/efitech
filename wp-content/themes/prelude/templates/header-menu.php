<?php
/**
 * Header / Menu
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Define & get variables
$logo_size = $menu = '';
$menu_logo_url = home_url( '/' );
$menu_logo = prelude_get_mod( 'mobile_menu_logo' );
$menu_logo_width = prelude_get_mod( 'mobile_menu_logo_width' );
$btn_text = prelude_get_mod( 'header_button_text' );
$btn_url = prelude_get_mod( 'header_button_url' );

// Get header style
$header_style = prelude_get_mod( 'header_site_style', 'style-1' );
if ( is_page() && prelude_metabox('header_style') )
	$header_style = prelude_metabox('header_style');

if ( $menu_logo_width )
	$logo_size .= 'max-width:'. intval( $menu_logo_width ) .'px;';

if ( 'style-1' == $header_style || 'style-2' == $header_style
	|| 'style-3' == $header_style || 'style-4' == $header_style ) {
	if ( prelude_get_mod( 'header_button', false ) )
		echo '<div class="header-button"><a href="'. esc_url( $btn_url ) .'">'. esc_html( $btn_text ) .'</a></div>';
}

if ( prelude_get_mod( 'header_search_icon', false ) ) {
	echo '<div class="header-search-wrap"><a href="#" class="header-search-trigger"><span class="pe-7s-search"></span></a></div>';
}

if ( prelude_get_mod( 'header_cart_icon', false ) )
	echo prelude_header_cart();
?>

<ul class="nav-extend">
	<?php if ( $menu_logo ) : ?>
		<li class="ext menu-logo"><span class="menu-logo-inner" style="<?php echo esc_attr( $logo_size ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $menu_logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>" /></a></span></li>
	<?php endif; ?>

	<?php if ( prelude_get_mod( 'header_search_icon', false ) ) : ?>
	<li class="ext"><?php get_search_form(); ?></li>
	<?php endif; ?>

	<?php if ( class_exists( 'woocommerce' ) && prelude_get_mod( 'header_cart_icon', false ) ) : ?>
	<li class="ext"><a class="cart-info" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php echo esc_attr__( 'View your shopping cart', 'prelude' ); ?>"><?php echo sprintf ( _n( '%d item', '%d items', WC()->cart->get_cart_contents_count(), 'prelude' ), WC()->cart->get_cart_contents_count() ); ?> <?php echo WC()->cart->get_cart_total(); ?></a></li>
	<?php endif; ?>
</ul>

<?php if ( is_page_template( 'templates/page-onepage.php' ) ) {
	$menu = 'onepage'; } else { $menu = 'primary'; }
?>

<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'onepage' ) ) : ?>
	<div class="mobile-button"><span></span></div>

	<nav id="main-nav" class="main-nav">
		<?php
		wp_nav_menu( array(
			'theme_location' => $menu,
			'link_before' => '<span>',
			'link_after'=>'</span>',
			'fallback_cb' => false,
			'container' => false
		) );
		?>
	</nav>
<?php endif; ?>
