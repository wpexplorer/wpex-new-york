<?php
/**
 * Alter WooCommerce products per page
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

// Alter shop posts per page
function wpex_woo_posts_per_page( $ppp ) {
	return wpex_get_theme_mod( 'woo_shop_ppp' );
}
add_filter( 'loop_shop_per_page', 'wpex_woo_posts_per_page', 10 );

// Alter related products posts per page
function wpex_woo_related_posts_per_page( $args ) {
	$args['posts_per_page'] = wpex_get_theme_mod( 'woo_related_ppp' );
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'wpex_woo_related_posts_per_page', 10 );

// Alter cross-sells posts per page
function wpex_woo_cross_sells_total() {
	return 2;
}
add_filter( 'woocommerce_cross_sells_total', 'wpex_woo_cross_sells_total' );