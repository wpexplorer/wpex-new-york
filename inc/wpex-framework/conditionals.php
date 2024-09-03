<?php
/**
 * Useful conditionals for this theme
 *
 * @author    WPExplorer
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

/**
 * Check if responsiveness is enabled
 *
 * @since 1.0.0
 */
function wpex_is_responsive() {
	return wpex_get_theme_mod( 'responsive' );
}

/**
 * Check if RTL is enabled
 *
 * @since 1.0.0
 */
function wpex_is_rtl() {
	if ( is_rtl() || isset( $_GET['rtl'] ) ) {
		return true;
	}
}

/**
 * Check if archive header is enabled
 *
 * @since 1.0.0
 */
function wpex_archive_has_header() {
	$bool = false;
	if ( is_archive() ) {
		$bool = true;
	}
	if ( function_exists( 'wpex_get_term_thumbnail_id' ) && wpex_get_term_thumbnail_id() ) {
		$bool = false;
	}
	return apply_filters( 'wpex_archive_has_header', $bool );
}

/**
 * Show archive thumbnails?
 *
 * @since 1.0.0
 */
function wpex_archive_has_thumbnails() {
	if ( ! has_post_thumbnail() ) {
		return false;
	}
	return apply_filters( 'wpex_archive_has_thumbnails', wpex_get_theme_mod( 'archive_thumbnail', true ) );
}

/**
 * Show post thumbnail?
 *
 * @since 1.0.0
 */
function wpex_post_has_thumbnail() {
	if ( ! has_post_thumbnail() ) {
		return false;
	}
	if ( 'post' == get_post_type() ) {
		$return = wpex_get_theme_mod( 'post_thumbnail' );
	} else {
		$return = true;
	}
	return apply_filters( 'wpex_post_has_thumbnail', $return );
}

/**
 * Check if comments are enabled
 *
 * @since 1.0.0
 */
function wpex_has_comments( $post_type = '' ) {
	$bool      = true; // enabled by default
	$post_type = $post_type ? $post_type : get_post_type();
	if ( 'page' == $post_type && ! wpex_get_theme_mod( 'comments_on_pages' ) ) {
		$bool = false;
	}
	if ( 'post' == $post_type && ! wpex_get_theme_mod( 'comments_on_posts' ) ) {
		$bool = false;
	}
	return apply_filters( 'wpex_has_comments', $bool, $post_type );
}

/**
 * Check if post has a video
 *
 * @since 1.0.0
 */
function wpex_has_post_video( $post_id = '' ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$bool = false;
	if ( get_post_meta( $post_id, 'wpex_post_video', true ) ) {
		$bool = true;
	}
	return apply_filters( 'wpex_has_post_video', $bool );
}

/**
 * Check if post has a audio
 *
 * @since 1.0.0
 */
function wpex_has_post_audio( $post_id = '' ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$bool = false;
	if ( get_post_meta( $post_id, 'wpex_post_audio', true ) ) {
		$bool = true;
	}
	return apply_filters( 'wpex_has_post_audio', $bool );
}

/**
 * Check if social share is enabled
 *
 * @since 1.0.0
 */
function wpex_has_social_share( $type = 'post' ) {
	return apply_filters( 'wpex_has_social_share', wpex_get_theme_mod( $type .'_has_social_share' ) );
}

/**
 * Check if footer widgets should display
 *
 * @since 1.0.0
 */
function wpex_has_footer_widgets() {
	$bool    = false;
	$columns = wpex_get_footer_widget_columns();
	if ( 'none' == $columns ) {
		$bool = false;
	} else {
		$columns = intval( $columns );
		$columns = ( $columns && $columns < 10 ) ? $columns : 4;
		$x = 1;
		while ( $x <= $columns ) :
			if ( is_active_sidebar( 'wpex_footer_' . $x ) ) {
				$bool = true;
				break;
			}
			$x++;
		endwhile;
	}
	return apply_filters( 'wpex_has_footer_widgets', $bool );
}

/**
 * Check if custom excerpt is enabled
 *
 * @since 1.0.0
 */
function wpex_has_custom_excerpt() {
	$display = wpex_get_theme_mod( 'entry_content_display' );
	$length  = wpex_get_theme_mod( 'entry_excerpt_length' );
	if ( 'excerpt' == $display && $length > 0 ) {
		$bool = true;
	} else {
		$bool = false;
	}
	return apply_filters( 'wpex_has_custom_excerpt', $bool );
}

/**
 * Checks if a user has social options defined
 *
 * @since 1.0.0
 */
function wpex_author_has_social( $user_id = NULL ) {
	$bool    = false;
	$user_id = $user_id ? $user_id : get_the_author_meta( 'ID' );
	if ( get_the_author_meta( 'wpex_twitter', $user_id )
		|| get_the_author_meta( 'wpex_facebook', $user_id )
		|| get_the_author_meta( 'wpex_googleplus', $user_id )
		|| get_the_author_meta( 'wpex_linkedin', $user_id )
		|| get_the_author_meta( 'wpex_instagram', $user_id )
		|| get_the_author_meta( 'wpex_pinterest', $user_id )
	) {
		$bool = true;
	}
	return apply_filters( 'wpex_author_has_social', $bool );
}