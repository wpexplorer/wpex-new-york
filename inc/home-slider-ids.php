<?php
/**
 * Exclude ID's on the homepage
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

function wpex_get_home_slider_ids() {

	$ids = array();

	$count   = apply_filters( 'wpex_home_slider_count', wpex_get_theme_mod( 'home_slider_count' ) );
	$content = apply_filters( 'wpex_home_slider_content', wpex_get_theme_mod( 'home_slider_content' ) );

	if ( 'categories' == $content ) {
		return;
	}

	if ( $content && 'none' != $content && $count >= 1 ) {

		// Define query args
		$args = array(
			'post_type'           =>'post',
			'posts_per_page'      => $count,
			'no_found_rows'       => true,
			'meta_key'            => '_thumbnail_id',
			'fields'              => 'ids',
			'ignore_sticky_posts' => 1,
		);

		// Tax query
		if ( 'recent_posts' != $content ) {

			$args['tax_query'] = array(
				array(
					'taxonomy' => 'category',
					'field'    => 'ID',
					'terms'    => intval( $content ),
				),
			);

		}

		// Get posts based on featured category
		$wpex_query = new WP_Query( $args );

		if ( $wpex_query->posts ) {
			$ids = $wpex_query->posts;
		}

	}

	return $ids;

}