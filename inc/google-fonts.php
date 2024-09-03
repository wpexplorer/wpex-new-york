<?php
/**
 * Load Custom Google Fonts
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

function wpex_enqueue_google_fonts() {

	// Return if Google fonts are disabled
	if ( get_theme_mod( 'wpex_disable_google_fonts', false ) ) {
		return;
	}

	// Load Droid Serif
	wp_enqueue_style(
		'wpex-pt-serif',
		'https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext'
	);

}
add_action( 'wp_enqueue_scripts', 'wpex_enqueue_google_fonts' );