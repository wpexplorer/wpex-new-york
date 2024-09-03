<?php
/**
 * Displays the entry thumbnail.
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Make sure thumbnail exists
// Make sure thumbnail exists and is enabled
if ( ! has_post_thumbnail() || ! wpex_get_theme_mod( 'entry_thumbnail' ) ) {
	return;
}

// Check if singular post
global $wpex_is_singular;
$wpex_is_singular = isset( $wpex_is_singular ) ? $wpex_is_singular : is_singular();

// Current query
if ( $wpex_is_singular ) {
	$thumbnail_size = 'wpex_entry_related';
} else {
	$thumbnail_size = 'wpex_entry';
} ?>

<div class="wpex-entry-thumbnail wpex-entry-media wpex-clr">

	<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php 

		// Display thumbnail
		the_post_thumbnail( $thumbnail_size );

	?></a>
	
</div><!-- .wpex-entry-thumbnail -->