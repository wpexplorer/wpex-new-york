<?php
/**
 * The Template for displaying all single posts.
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
} ?>

<?php
/**
 * wpex_hook_content_area_before hook.
 */
do_action( 'wpex_hook_content_area_before' ); ?>

<?php
/**
 * wpex_hook_content_area_before hook.
 */
do_action( 'wpex_hook_content_area_before' ); ?>

<div class="wpex-content-area wpex-clr">

	<?php
	/**
	 * wpex_hook_content_area_top hook.
	 */
	do_action( 'wpex_hook_content_area_top' ); ?>

	<main class="wpex-site-main wpex-clr">

		<?php
		/**
		 * wpex_hook_site_main_top hook.
		 */
		do_action( 'wpex_hook_site_main_top' ); ?>

		<?php
		// Main loop
		while ( have_posts() ) : the_post(); ?>

			<?php
			// Get page layout
			wpex_get_template_part( 'post_layout' ); ?>

		<?php endwhile; ?>

		<?php
		/**
		 * wpex_hook_site_main_bottom hook.
		 */
		do_action( 'wpex_hook_site_main_bottom' ); ?>

	</main><!-- .wpex-site-main -->

	<?php
	/**
	 * wpex_hook_content_area_bottom hook.
	 */
	do_action( 'wpex_hook_content_area_bottom' ); ?>

</div><!-- .wpex-content-area -->

<?php
/**
 * wpex_hook_content_area_after hook.
 */
do_action( 'wpex_hook_content_area_after' ); ?>