<?php
/**
 * Footer Widgets
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Exit if disabled via Customizer or Metabox
if ( ! prelude_get_mod( 'footer_widgets', true ) || ( is_page() && prelude_metabox('hide_footer') ) )
	return false;

// Get options



$logo_widget = $cls_grid = '';
$columns = prelude_get_mod( 'footer_columns', '4' );
$gutter = prelude_get_mod( 'footer_column_gutter', '30' );
$grid_cls1 = $grid_cls2 = $grid_cls3 = $grid_cls4 = 'span_1_of_'. $columns;

if ( $columns == '5' ) {
	$cls_grid = 'special-grid';
	$grid_cls1 = 'w370';
	$grid_cls2 = 'w170';
	$grid_cls3 = 'w170';
	$grid_cls4 = 'w170';
	$grid_cls5 = 'w170';
} else {
	$cls_grid .= ' gutter-'. $gutter;
}

if ( is_page() && prelude_metabox('logo_widget') != 'green' ) {
	$logo_widget = 'logo-'. prelude_metabox('logo_widget');
}

if ( is_active_sidebar( 'sidebar-footer-1' ) ||
	is_active_sidebar( 'sidebar-footer-2' ) ||
	is_active_sidebar( 'sidebar-footer-3' ) ||
	is_active_sidebar( 'sidebar-footer-4' ) ||
	is_active_sidebar( 'sidebar-footer-5' ) ) :
?>
<footer id="footer" class="<?php echo esc_attr( $logo_widget ); ?>" style="<?php echo prelude_footer_bg(); ?>">
	<?php 
	$prefooter = prelude_get_mod('pre_footer_type');

	if ( is_page() ) {
		if ( prelude_metabox('pre_footer_type') != '' ) {
			$prefooter = prelude_metabox('pre_footer_type');
		} else {
			$prefooter = '';
		}
	}
	
	if ( $prefooter ) get_template_part( 'templates/footer-'. $prefooter );
	?>
	
	<div id="footer-widgets" class="prelude-container">
		<div class="footer-grid <?php echo esc_attr( $cls_grid ); ?>">
			<?php
			// Footer widget 1 ?>
			<div class="<?php echo esc_attr( $grid_cls1 ); ?> col">
				<?php if ( is_active_sidebar( 'sidebar-footer-1' ) ) dynamic_sidebar( 'sidebar-footer-1' ); ?>
			</div>

			<?php
			// Footer widget 2
			if ( $columns > '1' ) : ?>
				<div class="<?php echo esc_attr( $grid_cls2 ); ?> col">
					<?php if ( is_active_sidebar( 'sidebar-footer-2' ) ) dynamic_sidebar( 'sidebar-footer-2' ); ?>
				</div>
			<?php endif; ?>
			
			<?php
			// Footer widget 3
			if ( $columns > '2' ) : ?>
				<div class="<?php echo esc_attr( $grid_cls3 ); ?> col">
					<?php if ( is_active_sidebar( 'sidebar-footer-3' ) ) dynamic_sidebar( 'sidebar-footer-3' ); ?>
				</div>
			<?php endif; ?>

			<?php
			// Footer widget 4
			if ( $columns > '3' ) : ?>
				<div class="<?php echo esc_attr( $grid_cls4 ); ?> col">
					<?php if ( is_active_sidebar( 'sidebar-footer-4' ) ) dynamic_sidebar( 'sidebar-footer-4' ); ?>
				</div>
			<?php endif; ?>

			<?php
			// Footer widget 5
			if ( $columns > '4' ) : ?>
				<div class="<?php echo esc_attr( $grid_cls5 ); ?> col">
					<?php if ( is_active_sidebar( 'sidebar-footer-5' ) ) dynamic_sidebar( 'sidebar-footer-5' ); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</footer>
<?php endif; ?>