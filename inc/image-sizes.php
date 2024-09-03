<?php
/**
 * Define theme image sizes
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

add_filter( 'wpex_get_image_sizes', function() {
	return array(
		'entry'         => esc_html__( 'Entry', 'wpex-new-york' ),
		'post'          => esc_html__( 'Single Post', 'wpex-new-york' ),
		'entry_related' => esc_html__( 'Related Entries', 'wpex-new-york' ),
		'page'          => esc_html__( 'Pages', 'wpex-new-york' ),
		'home_slider'   => esc_html__( 'Home Slider', 'wpex-new-york' ),
	);
} );