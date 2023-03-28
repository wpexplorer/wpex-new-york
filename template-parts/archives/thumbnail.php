<?php
/**
 * Archives thumbnail
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

// Return if not archive
if ( ! is_archive() ) {
	return;
}

// Get thumbnail ID
$thumbnail_src = wpex_get_term_thumbnail_src();

// Output thumbnail id
if ( $thumbnail_src ) : ?>

	<div class="wpex-archive-banner" style="background-image:url(<?php echo esc_url( $thumbnail_src ); ?>)">
		<div class="wpex-table">
			<div class="wpex-table-cell">
				<h1><?php echo wp_kses_post( get_the_archive_title() ); ?></h1>
				<?php
				// Display description
				if ( ( is_category() || is_tag() ) && term_description() ) : ?>
					<div class="wpex-description wpex-clr"><?php echo term_description(); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>

<?php endif;