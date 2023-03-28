<?php
/**
 * Configure theme comments
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

function wpex_comment_class( $classes ) {
	$classes[] = 'wpex-content';
	return $classes;
}
add_action( 'comment_class', 'wpex_comment_class' );