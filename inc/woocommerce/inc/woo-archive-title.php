<?php
/**
 * Filter the archive title
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

function wpex_woo_archive_title( $title ) {
	if ( is_shop() ) {
		return '';
		$shop_id = wc_get_page_id( 'shop' );
		if ( $shop_id ) {
			$title = get_the_title( $shop_id );
		}
	}
	if ( is_product_category() || is_product_tag() ) {
		$title = single_term_title( '', false );
	}
	return $title;
}
add_filter( 'get_the_archive_title', 'wpex_woo_archive_title' );