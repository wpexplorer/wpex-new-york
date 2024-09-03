<?php
/**
 * Edit Onsale Badge
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

function wpex_woo_sale_flash() {
	return '<span class="onsale">' . esc_html__( 'Sale', 'wpex-new-york' ) . '</span>';
}
add_filter( 'woocommerce_sale_flash', 'wpex_woo_sale_flash' );