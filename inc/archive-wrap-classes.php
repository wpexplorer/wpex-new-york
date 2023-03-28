<?php
/**
 * Return correct loop grid classes
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

function wpex_get_archive_wrap_classes() {

	// Main classes
	$classes = array( 'wpex-entries', 'wpex-clr' );
	
	// Get entry style
	$entry_style = wpex_get_entry_style();
	$classes[]   = 'wpex-style-'. $entry_style;
	
	// Get columns
	if ( 'grid' == $entry_style ) {
		$classes[] = 'wpex-row';
		$classes[] = 'wpex-gap-30';
	}

	// Apply filters
	$classes = apply_filters( 'wpex_get_archive_wrap_classes', $classes );

	// Return classes
	return esc_attr( implode( ' ', $classes ) );

}