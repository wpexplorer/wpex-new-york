<?php
/**
 * Return entry blocks
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      https://www.wpexplorer.com/
 * @since     1.0.0
 */

function wpex_get_entry_blocks() {

	// Available blocks
	$a_blocks = array(
		'categories' => esc_html__( 'Categories', 'wpex-new-york' ),
		'header'     => esc_html__( 'Header', 'wpex-new-york' ),
		'date'       => esc_html__( 'Date', 'wpex-new-york' ),
		'media'      => esc_html__( 'Media', 'wpex-new-york' ),
		'content'    => esc_html__( 'Content', 'wpex-new-york' ),
		'share'      => esc_html__( 'Share', 'wpex-new-york' ),
	);

	// Get entry style
	$entry_style = wpex_get_entry_style();

	// Full-entry blocks
	if ( 'full' == $entry_style ) {

		$blocks = $a_blocks;

	}

	// Left/Right Blocks
	elseif ( 'left_right' == $entry_style ) {

		$blocks = array(
			'media'              => $a_blocks['media'],
			'details_wrap_open'  => 'details_wrap_open',
			'categories'         => $a_blocks['categories'],
			'header'             => $a_blocks['header'],
			'date'               => $a_blocks['date'],
			'content'            => $a_blocks['content'],
			'share'              => $a_blocks['share'],
			'details_wrap_close' => 'details_wrap_close',
		);

	}

	// Grid Blocks
	elseif ( 'grid' == $entry_style ) {

		$blocks = array(
			'media'              => $a_blocks['media'],
			'categories'         => $a_blocks['categories'],
			'header'             => $a_blocks['header'],
			'date'               => $a_blocks['date'],
			'content'            => $a_blocks['content'],
			'share'              => $a_blocks['share'],
		);
	}

	// Return all blocks
	else {

		$blocks = $a_blocks;

	}

	// Apply filters and return blocks
	return apply_filters( 'wpex_entry_blocks', $blocks, get_post_type() );

}