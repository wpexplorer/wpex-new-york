<?php
/**
 * Configures Translators (WPMl, Polylang, etc)
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

add_filter( 'wpex_register_theme_mod_strings', function() {
	return array(
		'wpex_logo'                    => '',
		'wpex_logo_retina'             => '',
		'wpex_home_slider_custom_code' => '',
	);
} );