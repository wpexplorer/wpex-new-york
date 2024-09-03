<?php
/**
 * Custom Actions
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

add_action( 'woocommerce_single_product_summary', 'wpex_get_edit_post_link', 99 );