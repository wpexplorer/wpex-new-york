<?php
/**
 * Defines all settings for the customizer class
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

if ( ! function_exists( 'wpex_customizer_config' ) ) {

	function wpex_customizer_config( $panels ) {

		/*-----------------------------------------------------------------------------------*/
		/* - Useful vars
		/*-----------------------------------------------------------------------------------*/

		// Columns
		$columns = array(
			'' => esc_html__( 'Default', 'wpex-new-york' ),
			1  => 1,
			2  => 2,
			3  => 3,
			4  => 4,
		);

		// Layouts
		$layouts = array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'wpex-new-york' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'wpex-new-york' ),
			'full-width'    => esc_html__( 'No Sidebar', 'wpex-new-york' ),
		);

		// Register General Panel
		$panels['general'] = array(
			'title' => esc_html__( 'General Theme Settings', 'wpex-new-york' ),
			'sections' => array()
		);

		// Array of setting partials
		$setting_files = array(
			'site-widths',
			'layouts',
			'header',
			'home',
			'entries',
			'posts',
			'footer',
			'discussion',
			'search',
			'image-sizes',
		);

		// Loop through and include setting files
		foreach ( $setting_files as $file ) {
			require_once get_parent_theme_file_path( WPEX_INC_DIR . 'theme-mods/settings/' . $file . '.php' );
		}

		// Return panels array
		return $panels;

	}
}
add_filter( 'wpex_customizer_panels', 'wpex_customizer_config' );