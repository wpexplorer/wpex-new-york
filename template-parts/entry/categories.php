<?php
/**
 * Entry categories
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

// Standard posts only
if ( 'post' != get_post_type() ) {
	return;
} ?>

<div class="wpex-entry-categories wpex-clr"><?php the_category( ', ' ); ?></div>