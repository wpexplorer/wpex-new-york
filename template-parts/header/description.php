<?php
/**
 * Outputs the header logo
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

if ( wpex_get_theme_mod( 'header_description' ) && $description = get_bloginfo( 'description' ) ) : ?>

	<div class="wpex-site-header-description wpex-clr">
		<?php echo wp_kses_post( $description ); ?>
	</div><!-- .wpex-site-header-description -->

<?php endif; ?>