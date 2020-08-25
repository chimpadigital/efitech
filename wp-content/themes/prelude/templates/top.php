<?php
/**
 * Top Bar
 *
 * @package prelude
 * @version 3.6.8
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// Get Top style
$top_style = prelude_get_mod( 'top_bar_site_style', 'hide' );
if ( is_page() && prelude_metabox('top_bar_style') )
    $top_style = prelude_metabox('top_bar_style');

if ( $top_style == 'hide' ) 
    return;
?>

<div id="top-bar" style="<?php echo prelude_top_bar_style(); ?>">
    <div id="top-bar-inner" class="prelude-container">
        <div class="top-bar-inner-wrap">
            <?php
            // Get topbar content
            get_template_part( 'templates/top-content' );

            // Get topbar socials
            get_template_part( 'templates/top-socials' );
            ?>
        </div>
    </div>
</div><!-- /#top-bar -->