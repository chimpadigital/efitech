<?php
/**
 * Gets all theme mods and stores them in an easily accessable global var to limit DB requests
 *
 * @package prelude
 * @version 3.6.8
 */

// Define globals
global $prelude_theme_mods;
$prelude_theme_mods = get_theme_mods();

// Returns theme mod from global var
function prelude_get_mod( $id, $default = '' ) {

	// Return get_theme_mod on customize_preview
	if ( is_customize_preview() ) {
		return get_theme_mod( $id, $default );
	}
   
	// Get global object
	global $prelude_theme_mods;

	// Return data from global object
	if ( ! empty( $prelude_theme_mods ) ) {

		// Return value
		if ( isset( $prelude_theme_mods[$id] ) ) {
			return $prelude_theme_mods[$id];
		}

		// Return default
		else {
			return $default;
		}
	}

	// Global object not found return using get_theme_mod
	else {
		return get_theme_mod( $id, $default );
	}
}

// Returns global mods
function prelude_get_mods() {
	global $prelude_theme_mods;
	return $prelude_theme_mods;
}
