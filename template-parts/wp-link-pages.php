<?php
/**
 * Displays post pagination when using the <!-next-> tag
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wp_link_pages( array(
	'before'           => '<div class="wpex-wp-link-pages wpex-clr">',
	'after'            => '</div>',
	'next_or_number'   => 'next',
	'nextpagelink'     => esc_html__( 'Next', 'wpex-new-york' ),
	'previouspagelink' => esc_html__( 'Previous', 'wpex-new-york' ),
) );