<?php
/**
 * Redirect cart page if empty
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

function wpex_woo_redirect_empty_cart() {
	if ( wpex_get_theme_mod( 'woo_redirect_empty_cart' ) ) {
		global $woocommerce;
		if ( is_cart() && WC()->cart->cart_contents_count == 0 ) {
			if ( $redirect = get_permalink( woocommerce_get_page_id( 'shop' ) ) ) {
				wp_safe_redirect( $redirect );
			}
		}
	}
}
add_action( 'template_redirect', 'wpex_woo_redirect_empty_cart' );