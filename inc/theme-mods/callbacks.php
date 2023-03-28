<?php
/**
 * Customizer callback functions
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */


/* Entries
-------------------------------------------------------------------------------*/
function wpex_cac_entry_style_is_grid() {
	if ( 'grid' == wpex_get_theme_mod( 'entry_style' ) ) {
		return true;
	} else {
		return false;
	}
}

function wpex_cac_entry_has_excerpt() {
	if ( 'excerpt' == wpex_get_theme_mod( 'entry_content_display' ) ) {
		return true;
	} else {
		return false;
	}
}

/* Entries
-------------------------------------------------------------------------------*/
function wpex_cac_post_has_related() {
	if ( wpex_get_theme_mod( 'post_related', true ) && wpex_get_theme_mod( 'post_related_count', 6 ) ) {
		return true;
	} else {
		return false;
	}
}