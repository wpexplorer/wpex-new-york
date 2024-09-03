<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that other
 * 'pages' on your WordPress site will use a different template.
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
		 *
		 */
		do_action( 'wpex_hook_site_main_top' ); ?>

		<?php
		// Main loop
		while ( have_posts() ) : the_post(); ?>

			<?php
			// Get page layout
			wpex_get_template_part( 'page_layout' ); ?>

		<?php endwhile; ?>

		<?php
		/**
		 * wpex_hook_site_main_bottom hook.
		 *
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