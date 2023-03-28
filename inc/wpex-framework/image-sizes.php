<?php
/**
 * Register image sizes
 *
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

/**
 * Loops through and registers image sizes
 *
 * @since 1.0.0
 */
function wpex_register_image_sizes() {
	$get_image_sizes = wpex_get_image_sizes();
	if ( ! empty( $get_image_sizes ) ) {
		foreach ( $get_image_sizes as $size => $label ) {
			add_image_size(
				'wpex_'. $size,
				wpex_get_theme_mod( $size .'_thumb_width', true ),
				wpex_get_theme_mod( $size .'_thumb_height', true ),
				wpex_parse_image_crop( wpex_get_theme_mod( $size .'_thumb_crop', true ) )
			);
		}
	}
}
add_action( 'after_setup_theme', 'wpex_register_image_sizes' );