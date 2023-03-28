<?php
/**
 * Registers theme mods for translations.
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

/**
 * Strings to translate
 *
 * @since 1.0.0
 */
function wpex_register_theme_mod_strings() {
	return apply_filters( 'wpex_register_theme_mod_strings', array() );
}

/**
 * Registers strings
 *
 * @since 1.0.0
 */
function wpex_wpml_register_strings( $key, $default = null ) {

	// Get strings
	$strings = wpex_register_theme_mod_strings();

	// Register strings for Polylang
	if ( function_exists( 'pll_register_string' ) ) {
		foreach( $strings as $string => $default ) {
			pll_register_string( $string, get_theme_mod( $string, $default ), 'Theme Mod', true );
		}
	}

	// Register strings for WPMl
	elseif ( function_exists( 'icl_register_string' ) ) {
		foreach( $strings as $string => $default ) {
			icl_register_string( 'Theme Mod', $string, get_theme_mod( $string, $default ) );
		}
	}

}
add_action( 'admin_init', 'wpex_wpml_register_strings' );