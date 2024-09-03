<?php
/**
 * Add responsive support for inline embeds
 *
 * @package   New York WordPress Theme
 * @author    WPExplorer
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      https://www.wpexplorer.com/
 * @since     1.0.0
 */

function wpex_responsive_oembeds( $cache, $url, $attr, $post_ID ) {

	if ( current_theme_supports( 'responsive-embeds' ) ) {
		return $cache;
	}

	// Supported embeds
	$hosts = apply_filters( 'wpex_oembed_responsive_hosts', array(
		'vimeo.com',
		'youtube.com',
		'blip.tv',
		'money.cnn.com',
		'dailymotion.com',
		'flickr.com',
		'hulu.com',
		'kickstarter.com',
		'vine.co',
		'soundcloud.com',
	) );

	// Supports responsive
	$supports_responsive = false;

	// Check if responsive wrap should be added
	foreach( $hosts as $host ) {
		if ( strpos( $url, $host ) !== false ) {
			$supports_responsive = true;
			break; // no need to loop further
		}
	}

	// Output code
	if ( $supports_responsive ) {
		return '<p class="wpex-responsive-embed">' . $cache . '</p>';
	} else {
		return '<div class="wpex-responsive-embed">' . $cache . '</div>';
	}

}
add_filter( 'embed_oembed_html', 'wpex_responsive_oembeds', 99, 4 );