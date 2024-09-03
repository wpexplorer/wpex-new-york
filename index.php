<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme and one of the
 * two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
		 */
		do_action( 'wpex_hook_site_main_top' ); ?>

		<?php
		/**
		 * Get main archive loop > should not be loaded via hooks
		 */
		wpex_get_template_part( 'archive_loop' ); ?>

		<?php
		/**
		 * wpex_hook_site_main_bottom hook.
		 */
		do_action( 'wpex_hook_site_main_bottom' ); ?>

	</main><!-- .wpex-main -->

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