<?php
/**
 * Custom more link
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

function wpex_custom_more_link(){
	global $post;
	return '<a class="wpex-readmore" href="'. esc_url( get_permalink( $post->ID ) ) . '">'. esc_html__( 'read more', 'wpex-new-york' ) .' <span class="fa fa-angle-right" aria-hidden="true"></span></a>';
}
add_action( 'excerpt_more', 'wpex_custom_more_link' );