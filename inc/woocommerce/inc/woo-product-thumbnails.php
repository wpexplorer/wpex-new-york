<?php
/**
 * Alter WooCommerce product thumbnails
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

function wpex_woo_product_thumbnails_columns() {
	$layout = wpex_get_main_layout();
	if ( 'full-width' == $layout ) {
		return 5;
	} else {
		return 4;
	}
}
add_action( 'woocommerce_product_thumbnails_columns', 'wpex_woo_product_thumbnails_columns' );