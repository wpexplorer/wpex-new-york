<?php
/**
 * Top header navigation
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

// Check to make sure menu isn't empty
if ( has_nav_menu( 'wpex_main' ) ) : ?>
	
	<nav class="wpex-main-menu wpex-clr"<?php wpex_schema_markup( 'site_navigation' ); ?>>

		<div class="wpex-container wpex-clr">

			<?php
			// Display menu
			wp_nav_menu( array(
				'container'      => false,
				'theme_location' => 'wpex_main',
				'fallback_cb'    => false,
				'menu_class'     => 'wpex-drop-menu',
			) ); ?>

		</div><!-- .wpex-container -->

	</nav><!-- .wpex-container -->

<?php endif; ?>