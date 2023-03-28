<?php
/**
 * Displays the entry media
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

// Check if entry embeds are allowed
$entry_embeds = wpex_get_theme_mod( 'entry_embeds' );

// Entry video
if ( $entry_embeds && wpex_has_post_video()) :

	wpex_get_template_part( 'entry_video' );

// Display post audio
elseif ( $entry_embeds && wpex_has_post_audio() ) :

	wpex_get_template_part( 'entry_audio' );

// Display post thumbnail
else :

	wpex_get_template_part( 'entry_thumbnail' );

endif;