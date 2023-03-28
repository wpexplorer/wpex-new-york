<?php
/**
 * The template for the 404 not found page.
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
		 * Get Entry none content
		 */
		wpex_get_template_part( 'entry_none' ); ?>

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