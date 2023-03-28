<?php
/**
 * Adds cart link to menus
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

// Add the cart link to menu
function wpex_add_menu_cart_item_to_menus( $items, $args ) {

	if ( $args->theme_location === 'wpex_main' ) {

		$css_class = 'menu-item menu-item-type-cart menu-item-type-woocommerce-cart';

		if ( is_cart() ) {
			$css_class .= ' current-menu-item';
		}

		$items .= '<li class="' . esc_attr( $css_class ) . '">';

			$items .= wpex_menu_cart_item();

		$items .= '</li>';

	}

	return $items;

}
add_filter( 'wp_nav_menu_items', 'wpex_add_menu_cart_item_to_menus', 10, 2 );

// Function returns the main menu cart link
function wpex_menu_cart_item() {

	$output = '';

	$cart_count = WC()->cart->cart_contents_count;

	$css_class = 'wpex-menu-cart-total wpex-cart-total-'. intval( $cart_count );

	if ( $cart_count ) {
		$url = wc_get_cart_url();
	} else {
		$url = wc_get_page_permalink( 'shop' );
	}

	$html = $cart_extra = WC()->cart->get_cart_total();
	$html = str_replace( 'amount', '', $html );

	$output .= '<a href="'. esc_url( $url ) .'" class="' . esc_attr( $css_class ) . '">';

		$output .= '<span class="fa fa-shopping-bag" aria-hidden="true"></span>';

		$output .= wp_kses_post( $html );

	$output .= '</a>';

	return $output;
}


// Update cart link with AJAX
function wpex_main_menu_cart_link_fragments( $fragments ) {
	$fragments['.wpex-menu-cart-total'] = wpex_menu_cart_item();
	return $fragments;
}
add_filter( 'woocommerce_add_to_cart_fragments', 'wpex_main_menu_cart_link_fragments' );