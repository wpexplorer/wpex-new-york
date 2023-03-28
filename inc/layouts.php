<?php
/**
 * Custom layouts
 *
 * @link http://codex.wordpress.org/Function_Reference/body_class
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

function wpex_edit_main_layout( $layout ) {

	// 404 page layout
	if ( is_404() ) {
		$layout = 'full-width';
	}

	// Search template
	elseif ( is_page_template( 'templates/search.php' ) ) {
		$layout = 'full-width';
	}
	
	// Return classes
	return $layout;

}
add_action( 'wpex_get_main_layout', 'wpex_edit_main_layout' );