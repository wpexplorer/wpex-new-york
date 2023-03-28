<?php
/**
 * WooComerce Scripts
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

function wpex_woo_scripts() {
	if ( is_singular( 'product' ) || is_cart() ) {
		wp_enqueue_script(
			'wc-quantity-increment',
			wpex_asset_url( 'js/dynamic/wc-quantity-increment.js' ),
			array( 'jquery' ),
			'1.0',
			true
		);
	}
}
add_action( 'wp_enqueue_scripts', 'wpex_woo_scripts' );