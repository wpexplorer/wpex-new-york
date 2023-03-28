<?php
/**
 * Displays the next/previous post links
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

// Return if disabled
if ( ! wpex_get_theme_mod( 'post_next_prev' ) ) {
	return;
}

// Get post navigation
$args = apply_filters( 'wpex_post_navigation_args', array(
	'prev_text'	=> '<strong>'. esc_html__( 'Previous Article', 'wpex-new-york' ) . '</strong><div class="wpex-link"><span class="fa fa-angle-left" aria-hidden="true"></span>' . '%title</div>',
	'next_text'	=> '<strong>' . esc_html__( 'Next Article', 'wpex-new-york' ) . '</strong><div class="wpex-link">%title' . '<span class="fa fa-angle-right" aria-hidden="true"></span></div>',
) );
$post_nav = get_the_post_navigation( $args );
$post_nav = str_replace( 'role="navigation"', '', $post_nav );

// Display post navigation
if ( ! is_attachment() && $post_nav ) : ?>

	<div class="wpex-post-navigation">
		<div class="wpex-container wpex-clr"><?php echo wpex_sanitize( $post_nav, 'html' ); ?></div>
	</div><!-- .wpex-post-navigation -->

<?php endif; ?>