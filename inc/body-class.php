<?php
/**
 * Filter body classes
 *
 * @link http://codex.wordpress.org/Function_Reference/body_class
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

function wpex_body_class( $classes ) {

	// Add post layout
	$classes[] = 'wpex-'. wpex_get_main_layout();

	// Responsive
	if ( wpex_is_responsive() ) {
		$classes[] = 'wpex-responsive';
	}

	// Add entry style
	if ( ( is_home() || is_archive() ) && ! is_post_type_archive() ) {
		$classes[] = 'wpex-archive-style-' . wpex_get_entry_style();
	}

	// Sticky header
	if ( has_nav_menu( 'wpex_main' ) && wpex_get_theme_mod( 'sticky_main_menu' ) ) {
		$classes[] = 'wpex-has-sticky-menu';
	}

	// Make sure RTL class is added
	if ( wpex_is_rtl() ) {
		$classes[] = 'rtl';
	}

	// Has header image
	if ( apply_filters( 'wpex_custom_header', false ) && has_custom_header() ) {
		$classes[] = 'wpex-has-wp-custom-header';
	}
	
	// Return classes
	return $classes;

}
add_action( 'body_class', 'wpex_body_class' );