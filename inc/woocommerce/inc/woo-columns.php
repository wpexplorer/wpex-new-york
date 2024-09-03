<?php
/**
 * Alter WooCommerce product columns
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

/*-------------------------------------------------------------------------------*/
/* - Shop
/*-------------------------------------------------------------------------------*/

// Filter shop columns
function wpex_woo_shop_columns( $columns ) {
	return wpex_get_theme_mod( 'woo_shop_columns', true );
}
add_filter( 'loop_shop_columns', 'wpex_woo_shop_columns' );

// Filter body classes to add column class
function wpex_woo_shop_columns_body_class( $classes ) {
	if ( is_shop() || is_product_category() || is_product_tag() ) {
		$classes[] = 'columns-'. wpex_get_theme_mod( 'woo_shop_columns', true );
	}
	return $classes;
}
add_filter( 'body_class', 'wpex_woo_shop_columns_body_class' );


/*-------------------------------------------------------------------------------*/
/* - Single
/*-------------------------------------------------------------------------------*/

// Product gallery columns
function wpex_woocommerce_product_thumbnails_columns() {
	return 5;
}
add_filter( 'woocommerce_product_thumbnails_columns', 'wpex_woocommerce_product_thumbnails_columns' );

// Filter up-sells columns
function wpex_woo_single_loops_columns( $columns ) {
	return wpex_get_theme_mod( 'woo_single_loops_columns', true );
}
add_filter( 'woocommerce_up_sells_columns', 'wpex_woo_single_loops_columns' );

// Filter related args
function wpex_woo_related_columns( $args ) {
	$args['columns'] = wpex_get_theme_mod( 'woo_single_loops_columns', true );
	return $args;
}
add_filter( 'woocommerce_output_related_products_args', 'wpex_woo_related_columns', 10 );

// Filter body classes to add column class
function wpex_woo_single_loops_columns_body_class( $classes ) {
	if ( is_singular( 'product' ) ) {
		$classes[] = 'columns-'. wpex_get_theme_mod( 'woo_single_loops_columns', true );
	}
	return $classes;
}
add_filter( 'body_class', 'wpex_woo_single_loops_columns_body_class' );