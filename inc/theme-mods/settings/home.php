<?php
/**
 * Home settings
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

$parent_cats = get_categories( array(
	'orderby' => 'name',
	'parent' => 0
) );

$slider_content_ops = array(
	''			   => esc_html__( 'None - Disable', 'wpex-new-york' ),
	'recent_posts' => esc_html__( 'Recent Posts', 'wpex-new-york' ),
	'categories'   => esc_html__( 'Categories', 'wpex-new-york' ),
);

if ( $parent_cats && is_array( $parent_cats ) ) {
	foreach ( $parent_cats as $cat ) {
		$slider_content_ops[$cat->term_id] = $cat->name;
	}
}

$panels['general']['sections']['home'] = array(
	'id' => 'wpex_home',
	'title' => esc_html__( 'Home', 'wpex-new-york' ),
	'settings' => array(
		array(
			'id' => 'home_slider_content',
			'default' => 'recent_posts',
			'control' => array(
				'label' => __( 'Homepage Slider Content', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => $slider_content_ops,
				'desc' => esc_html__( 'In order for your slider to look good it is best if all the images are the same size. If your featured images vary in sizes be sure to go to the Image Sizes tab in the customizer to enter your custom width and height for your slider images and then regenerate your thumbnails.', 'wpex-new-york' ),
			),
		),
		array(
			'id' => 'home_slider_count',
			'default' => 6,
			'control' => array(
				'label' => __( 'Homepage Slider Count', 'wpex-new-york' ),
				'type' => 'text',
				'desc' => esc_html__( 'Minimum and recommended number is 6. If you do not have at least 6 unique posts to display the carousel will repeat the same item because of the infinite loop function of the carousel. You can always disable the carousel until your blog has enough content to display it nicely.', 'wpex-new-york' ),
			),
			'sanitize_callback' => 'wpex_home_slider_count_sanitize',
		),
		array(
			'id' => 'home_slider_exclude_posts',
			'default' => false,
			'control' => array(
				'label' => __( 'Exclude Posts From Main Loop?', 'wpex-new-york' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Check this box to exclude posts included in the slider from the homepage main loop.', 'wpex-new-york' ),
			),
		),
		array(
			'id' => 'home_slider_disable_on_paginated',
			'default' => false,
			'control' => array(
				'label' => __( 'Disable Slider on Paginated Pages?', 'wpex-new-york' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Check this box to display the slider on the first page of the homepage only and not when clicking the next and previous post links.', 'wpex-new-york' ),
			),
		),
		array(
			'id' => 'home_slider_custom_code',
			'control' => array(
				'label' => __( 'Custom Code', 'wpex-new-york' ),
				'type' => 'textarea',
				'desc' => esc_html__( 'HTML and shortcodes allowed.', 'wpex-new-york' ),
			),
		),
	),
);

/**
 * Sanitize minimum value for home slider
 *
 * @since 1.1.0
 */
function wpex_home_slider_count_sanitize( $val ) {
	$count = intval( $val );
	$count = ( $count < 6 ) ? 6 : $count;
	return $count;
}