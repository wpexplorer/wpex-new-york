<?php
/**
 * Alter the WooCommerce pagination arguments
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

function wpex_woo_pagination_args( $args ) {
	$args['prev_text'] = '<i class="fa fa-angle-double-left" aria-hidden="true"></i></span>' . esc_html__( 'Previous', 'wpex-new-york' );
	$args['next_text'] = esc_html__( 'Next', 'wpex-new-york' ) . '<i class="fa fa-angle-double-right" aria-hidden="true"></i>';
	return $args;
}
add_filter( 'woocommerce_pagination_args', 'wpex_woo_pagination_args' );