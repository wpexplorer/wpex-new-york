<?php
/**
 * Filter layouts for Woo Pages
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

function wpex_woo_layouts( $layout ) {
	if ( is_shop()
		|| is_product_category()
		|| is_product_tag()
		|| is_cart()
		|| is_checkout()
		|| is_account_page()
	) {
		$layout = wpex_get_theme_mod( 'woo_shop_layout', true );
	}
	if ( is_singular( 'product' ) ) {
		$layout = wpex_get_theme_mod( 'woo_single_product_layout', true );
	}
	return $layout;
}
add_filter( 'wpex_get_main_layout', 'wpex_woo_layouts' );