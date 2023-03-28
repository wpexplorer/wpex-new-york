<?php
/**
 * Prevent WP update checks
 *
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

function wpex_disable_wporg_request( $r, $url ) {

	// If it's not a theme update request, bail.
	if ( 0 !== strpos( $url, 'https://api.wordpress.org/themes/update-check/1.1/' ) ) {
		return $r;
	}

	// Decode the JSON response
	$themes = json_decode( $r['body']['themes'] );

	// Remove the active parent and child themes from the check
	$parent = get_option( 'template' );
	$child  = get_option( 'stylesheet' );
	unset( $themes->themes->$parent );
	unset( $themes->themes->$child );

	// Encode the updated JSON response
	$r['body']['themes'] = json_encode( $themes );

	return $r;

}
add_filter( 'http_request_args', 'wpex_disable_wporg_request', 5, 2 );