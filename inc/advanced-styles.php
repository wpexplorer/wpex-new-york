<?php
/**
 * Advanced theme styles not outputted by Customizer Class
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

function wpex_advanced_theme_styles() {

	// Add css
	$css = '';

	// Container width
	$width = wpex_get_theme_mod( 'layout_container_width' );
	if ( $width && strpos( $width, '%' ) == false ) {
		$width = intval( $width );
		$width = $width ? $width .'px' : null;
	}
	if ( $width ) {
		$css .= '.wpex-container { width: '. $width .'; }.wpex-site-main, .wpex-sidebar { max-width: none; }';
	}

	// Content width
	$width = wpex_sanitize( wpex_get_theme_mod( 'layout_content_width' ), 'px_pct' );
	if ( $width ) {
		$css .= '.wpex-site-main { width: '. $width .'; max-width: none; }';
	}

	// Sidebar width
	$width = wpex_sanitize( wpex_get_theme_mod( 'layout_sidebar_width' ), 'px_pct' );
	if ( $width ) {
		$css .= '.wpex-sidebar { width: '. $width .'; max-width: none; }';
	}

	// Mobile menu breakpoint
	$breakpoint = intval( apply_filters( 'wpex_mobile_menu_breakpoint', null ) );
	if ( $breakpoint ) {
		$breakpoint = $breakpoint . 'px';
		$css .= '@media only screen and ( max-width: ' . $breakpoint . ' ) {';
			$css .= '.wpex-responsive .wpex-main-menu .wpex-drop-menu { display: none; }';
			$css .= '.wpex-main-menu .slicknav_menu { display: block; }';
		$css .= '}';
	}

	// Minitfy CSS
	$css = function_exists( 'wpex_minify_css' ) ? wpex_minify_css( $css ) : $css;

	// Output CSS
	if ( $css ) {
		wp_add_inline_style( wpex_get_main_style_handle(), $css );
	}

}
add_action( 'wp_enqueue_scripts', 'wpex_advanced_theme_styles' );