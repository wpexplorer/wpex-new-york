<?php
/**
 * Adds data attributes to archives wrap
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

function wpex_get_archive_wrap_data() {

	// Only needed for grid style & when columns are > 1
	if ( 'grid' != wpex_get_entry_style() || intval( wpex_get_loop_columns() ) <= 1 ) {
		return;
	}

	// Add masonry data for grids
	if ( 'grid' == wpex_get_entry_style() ) {
		$layout_mode = wpex_get_theme_mod( 'grid_layout_mode' );
		if ( isset( $_GET['layout_mode'] ) ) {
			$layout_mode = esc_html( $_GET['layout_mode'] );
		}
		if ( $layout_mode && in_array( $layout_mode, array( 'masonry', 'fitRows' ) ) ) {
			$layout_mode = $layout_mode;
		} else {
			$layout_mode = 'fitRows';
		}

		// Only needed for masonry layout
		if ( 'masonry' == $layout_mode ) {
			$masonry_settings = apply_filters( 'wpex_masonry_data', array(
				'itemSelector'       => '.wpex-masonry-item',
				'originLeft'         => wpex_is_rtl() ? false : true,
				'layoutMode'         => $layout_mode,
				'transitionDuration' => '0',
			) );
			echo 'data-settings="'. htmlentities( json_encode( $masonry_settings ) ) .'"';
		}
	}

}