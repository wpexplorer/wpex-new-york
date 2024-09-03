<?php
/**
 * Main Loop
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

// Main Loop
if ( have_posts() ) : ?>

	<div id="wpex-grid" class="<?php echo wpex_get_archive_wrap_classes(); ?>"<?php echo wpex_get_archive_wrap_data( 'archive' ); ?>>   

		<?php
		// Get query
		global $wp_query, $wpex_count;

		// Define count
		$wpex_count = 0;

		// Loop through posts
		while ( have_posts() ) : the_post();

			// Add to counter
			$wpex_count++;

			// Display post entry
			wpex_get_template_part( 'entry' );

			// Reset count based on columns and clear floats
			if ( $wpex_count == wpex_get_loop_columns() ) {
				echo '<div class="wpex-clear"></div>';
				$wpex_count = '';
			}

		// End loop
		endwhile; ?>

	</div><!-- .wpex-entries -->

	<?php
	// Include pagination template part
	wpex_get_template_part( 'pagination' ); ?>

<?php
// Display no posts found message
else : ?>

	<?php
	// Include template part for when there aren't any posts
	wpex_get_template_part( 'entry_none' ); ?>

<?php endif; ?>