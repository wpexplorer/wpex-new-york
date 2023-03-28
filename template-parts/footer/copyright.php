<?php
/**
 * Footer bottom
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

$copy = 'New York <a href="https://www.wpexplorer.com/free-wordpress-themes/">theme</a> powered by <a href="https://wordpress.org/">WordPress</a>';

$copy = (string) apply_filters( 'wpex_footer_copyright', $copy );

if ( $copy ) : ?>

	<div class="footer-copyright wpex-clr"<?php wpex_schema_markup( 'footer_copyright' ); ?>>

		<?php echo wp_kses_post( do_shortcode( $copy ) ); ?>

	</div><!-- .footer-copyright -->

<?php endif; ?>