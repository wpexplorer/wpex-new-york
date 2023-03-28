<?php
/**
 * Return correct HTML tags for theme parts
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      https://www.wpexplorer.com/
 * @since     1.0.0
 */

function wpex_theme_html_tags( $tag, $context ) {
	if ( 'sidebar_widget_title' == $context ) {
		$tag = 'div';
	}
	return $tag;
}
add_filter( 'wpex_get_html_tag', 'wpex_theme_html_tags', 10, 2 );