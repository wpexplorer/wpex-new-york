<?php
/**
 * Enqueue theme CSS
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

function wpex_enqueue_theme_css() {
	
	// Main CSS
	wp_enqueue_style(
		wpex_get_main_style_handle(),
		get_stylesheet_uri(),
		array(),
		WPEX_THEME_VERSION
	);

	// Remove Contact Form 7 Styles
	if ( function_exists( 'wpcf7_enqueue_styles') ) {
		wp_dequeue_style( 'contact-form-7' );
	}

}
add_action( 'wp_enqueue_scripts', 'wpex_enqueue_theme_css' );