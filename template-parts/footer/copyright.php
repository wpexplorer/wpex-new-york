<?php
/**
 * Footer bottom
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

$copy = get_theme_mod( 'wpex_footer_copy' ) ?: 'Copyright ' . get_the_date( 'Y' ) . ' <a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html( get_bloginfo( 'name' ) ) . '</a>';

$copy = (string) apply_filters( 'wpex_footer_copyright', $copy );

if ( $copy ) : ?>

	<div class="footer-copyright wpex-clr"<?php wpex_schema_markup( 'footer_copyright' ); ?>>

		<?php echo do_shortcode( wp_kses_post( $copy ) ); ?>

	</div><!-- .footer-copyright -->

<?php endif; ?>