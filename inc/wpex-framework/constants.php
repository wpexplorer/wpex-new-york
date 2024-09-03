<?php
/**
 * Useful framework constants
 *
 * @author    WPExplorer
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

define( 'WPEX_VC_ACTIVE', class_exists( 'Vc_Manager' ) );
define( 'WPEX_BBPRESS_ACTIVE', class_exists( 'bbPress' ) );
define( 'WPEX_WOOCOMMERCE_ACTIVE', class_exists( 'WooCommerce' ) );
define( 'WPEX_WPML_ACTIVE', class_exists( 'SitePress' ) );
define( 'WPEX_POLYLANG_ACTIVE', function_exists( 'pll_get_post' ) );