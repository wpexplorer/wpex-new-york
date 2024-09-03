<?php
/**
 * Outputs the post header
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<header class="wpex-post-header wpex-clr">
	<h1 class="wpex-post-title"><span><?php the_title(); ?></span></h1>
</header><!-- .wpex-post-header -->