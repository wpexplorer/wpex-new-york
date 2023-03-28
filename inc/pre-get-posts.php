<?php
/**
 * Runs on pre_get_posts
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

function wpex_pre_get_posts( $query ) {

	// Do nothing in admin
	if ( is_admin() ) {
		return;
	}

	// Alter search results
	if ( wpex_get_theme_mod( 'search_posts_only' )
		&& $query->is_main_query()
		&& is_search()
	) {
		$post_type_query_var = false;
		if ( ! empty( $_GET[ 'post_type' ] ) ) {
			$post_type_query_var = true;
		}
		if ( ! $post_type_query_var ) {
			$query->set( 'post_type', array( 'post' ) );
		}
	}

	// Exclude posts on the homepage
	if ( wpex_get_theme_mod( 'home_slider_exclude_posts' )
		&& $query->is_home()
		&& $query->is_main_query()
		&& $ids = wpex_get_home_slider_ids()
	) {
		$query->set( 'post__not_in', $ids );
	}

	// Alter posts per page based on GET val
	if ( $query->is_main_query() && ! empty( $_GET['posts_per_page'] ) ) {
		return $query->set( 'posts_per_page', intval( $_GET['posts_per_page'] ) );
	}

}
add_action( 'pre_get_posts', 'wpex_pre_get_posts' );