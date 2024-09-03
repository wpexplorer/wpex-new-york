<?php
/**
 * The sidebar containing the main widget area.
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

// Return if it is full-width
if ( 'full-width' == wpex_get_main_layout() ) {
	return;
}

// Get correct sidebar
$sidebar = wpex_get_main_sidebar();

// Display sidebar if active
if ( is_active_sidebar( $sidebar ) ) : ?>

	<aside class="wpex-sidebar wpex-clr"<?php wpex_schema_markup( 'sidebar' ); ?>>
		<div class="wpex-sidebar-inner wpex-clr"><?php dynamic_sidebar( $sidebar ); ?></div>
	</aside><!-- .wpex-sidebar -->

<?php endif; ?>