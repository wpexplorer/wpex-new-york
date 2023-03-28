<?php
/**
 * Footer widgets
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

// Return if there arent any widgets
if ( ! wpex_has_footer_widgets() ) {
	return;
}

// Get footer columns option
$columns = intval( wpex_get_footer_widget_columns() );
$columns = ( $columns && $columns < 10 ) ? $columns : 4;

// Widget classes
$classes = 'wpex-footer-box wpex-col wpex-clr';
$classes .= ' wpex-col-' . intval( $columns ); ?>

<div class="wpex-footer-widgets-wrap wpex-container wpex-clr">

	<div class="wpex-footer-widgets wpex-row wpex-clr">

		<?php
		// Display widget
		$x = 1;
		while ( $x <= $columns ) :

			if ( is_active_sidebar( 'wpex_footer_' . $x ) ) : ?>
		
				<div class="<?php echo esc_attr( $classes ) ?>"><?php dynamic_sidebar( 'wpex_footer_' . $x ); ?></div>

			<?php endif;

		$x++;
		endwhile; ?>

	</div><!-- .wpex-footer-widgets -->

</div><!-- .wpex-footer-widgets-wrap -->