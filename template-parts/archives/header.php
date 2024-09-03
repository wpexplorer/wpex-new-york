<?php
/**
 * Archives header
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

// Display archives header if enabled & title exists
if ( wpex_archive_has_header() && $title = get_the_archive_title() ) : ?>

	<header class="wpex-archive-header wpex-clr">
		<h1><span><?php echo wp_kses_post( $title ); ?></span></h1>
		<?php wpex_get_archive_description(); ?>
	</header>

<?php endif; ?>