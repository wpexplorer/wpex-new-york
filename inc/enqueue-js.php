<?php
/**
 * Enqueue theme js
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

function wpex_enqueue_theme_js() {
	
	// Define js directory
	$js_dir_uri = get_template_directory_uri() . '/assets/js/';

	// Comment reply
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// HTML5
	wp_enqueue_script( 'html5shiv', $js_dir_uri . 'html5.js', array(), false, false );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );

	// Minify js?
	$combined_js = apply_filters( 'wpex_combined_js', true );

	// Theme js handle
	$handle = wpex_get_main_js_handle();

	// Load combined js
	if ( $combined_js ) {
		wp_enqueue_script(
			$handle,
			$js_dir_uri . 'theme.min.js',
			array( 'jquery' ),
			false,
			true
		);
	}

	// Load independent scripts
	else {

		// Images Loaded
		wp_enqueue_script(
			'imagesLoaded',
			$js_dir_uri . 'lib/imagesloaded.pkgd.js',
			array( 'jquery' ),
			'4.1.0',
			true
		);

		// Image slider
		wp_enqueue_script(
			'owl-carousel',
			$js_dir_uri . 'lib/owl.carousel.js',
			array( 'jquery' ),
			'2.2.0',
			true
		);
		
		// Isotope - For masonry grids
		wp_enqueue_script(
			'isotope',
			$js_dir_uri . 'lib/isotope.pkgd.js',
			array( 'jquery', 'imagesLoaded' ),
			'3.0.1',
			true
		);
		
		// Mobile dropdowns support
		wp_enqueue_script(
			'dropdownTouchSupport',
			$js_dir_uri . 'lib/dropdownTouchSupport.js',
			array( 'jquery' ),
			false,
			true
		);

		// Mobile Menu
		wp_enqueue_script(
			'slicknav',
			$js_dir_uri . 'lib/jquery.slicknav.js',
			array( 'jquery' ),
			false,
			true
		);
	
		// Responsive videos
		wp_enqueue_script(
			'fitvids',
			$js_dir_uri . 'lib/jquery.fitvids.js',
			array( 'jquery' ),
			'1.1',
			true
		);

		// Placeholders for old browsers
		wp_enqueue_script(
			'placeholders',
			$js_dir_uri . 'lib/placeholders.js',
			array( 'jquery' ),
			'1.0',
			true
		);

		// Theme functions
		wp_enqueue_script(
			$handle,
			$js_dir_uri . 'functions.js',
			array( 'jquery' ),
			false,
			true
		);
		
	}

	// Localize scripts
	$localize = apply_filters( 'wpexargs', array(
		'mobileSiteMenuLabel' => '',
	) );
	wp_localize_script( $handle, 'wpexargs', $localize );

}
add_action( 'wp_enqueue_scripts', 'wpex_enqueue_theme_js' );