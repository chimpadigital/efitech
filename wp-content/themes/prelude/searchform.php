<form role="search" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" class="search-form">
	<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Type your keyword...', 'placeholder', 'prelude' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'prelude' ); ?>" />
	<button type="submit" class="search-submit" title="<?php echo esc_attr__('Search', 'prelude'); ?>"><?php echo esc_html__('SEARCH', 'prelude'); ?></button>
</form>
