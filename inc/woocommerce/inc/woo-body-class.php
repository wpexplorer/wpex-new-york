<?php
/**
 * Filter body class for custom tweaks
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

function wpex_woo_body_class( $classes ) {
	if ( wpex_get_theme_mod( 'woo_hide_entry_rating' ) ) {
		$classes[] = 'wpex-hide-ratings';
	}
	if ( wpex_get_theme_mod( 'woo_hide_entry_cart_btn' ) ) {
		$classes[] = 'wpex-hide-entry-cart-btn';
	}
	if ( wpex_get_theme_mod( 'woo_hide_onsale_badge' ) ) {
		$classes[] = 'wpex-hide-onsale';
	}
	return $classes;
}
add_filter( 'body_class', 'wpex_woo_body_class' );