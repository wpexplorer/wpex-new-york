<?php
/**
 * Displays the post media
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

// Gallery
if ( wpex_post_has_gallery() )  :

	wpex_get_template_part( 'post_gallery' );

// Display post video
elseif ( wpex_has_post_video() ) :

	wpex_get_template_part( 'post_video' );

// Display post audio
elseif ( wpex_has_post_audio() ) :

	wpex_get_template_part( 'post_audio' );

// Display post thumbnail
elseif ( wpex_get_theme_mod( 'post_thumbnail' ) ) :

	wpex_get_template_part( 'post_thumbnail' );

endif;