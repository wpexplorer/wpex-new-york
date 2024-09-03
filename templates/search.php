<?php
/**
 * Template Name: Search Page
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
		// Main loop
		while ( have_posts() ) : the_post(); ?>

			<div class="wpex-search-template-wrap wpex-clr">

				<?php
				// Display header if not disabled
				if ( ! get_post_meta( get_the_ID(), 'wpex_hide_title', true ) ) : ?>
					<header class="page-header wpex-clr"><h1 class="wpex-page-header-title"><?php the_title(); ?></h1></header>
				<?php endif; ?>

				<div class="wpex-content wpex-clr">
					<?php the_content(); ?>
				</div><!-- .wpex-content -->
				
				<?php get_search_form(); ?>

			</div><!-- .wpex-search-template-wrap -->

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