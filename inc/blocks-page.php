<?php
/**
 * Return post blocks
 *
 * @package   New York WordPress Theme
 * @author    WPExplorer
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      https://www.wpexplorer.com/
 * @since     1.0.0
 */

function wpex_get_page_blocks() {

	// Available blocks
	$a_blocks = array(
		'header'        => esc_html__( 'Header', 'wpex-new-york' ),
		'media'         => esc_html__( 'Media', 'wpex-new-york' ),
		'content'       => esc_html__( 'Content', 'wpex-new-york' ),
		'wp_link_pages' => esc_html__( 'Next Page Links', 'wpex-new-york' ),
		'comments'      => esc_html__( 'Comments', 'wpex-new-york' ),
		'edit'          => esc_html__( 'Edit Link', 'wpex-new-york' ),
	);

	// Set correct blocks
	$blocks = $a_blocks;

	// Remove blocks on passprotected posts
	if ( apply_filters( 'wpex_page_password_required_unset_blocks', true ) && post_password_required() ) {
		unset(
			$blocks['media'],
			$blocks['wp_link_pages'],
			$blocks['comments']
		);
	}

	// Apply filters and return blocks
	return apply_filters( 'wpex_page_blocks', $blocks );

}