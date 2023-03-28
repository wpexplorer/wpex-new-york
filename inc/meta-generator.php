<?php
/**
 * Meta Generator
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

function wpex_theme_meta_generator() {
	$theme = wp_get_theme();
	echo '<meta name="generator" content="Built With The New York WordPress Theme '. $theme->get( 'Version' ) .' by WPExplorer.com" />';
	echo "\r\n";
}
add_action( 'wp_head', 'wpex_theme_meta_generator', 9999 );