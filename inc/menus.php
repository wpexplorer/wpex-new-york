<?php
/**
 * Configure theme menus
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

function wpex_register_menus(){
	register_nav_menus ( array(
		'wpex_main'          => esc_html__( 'Main', 'wpex-new-york' ),
		'wpex_mobile'        => esc_html__( 'Mobile Alternative', 'wpex-new-york' ),
		'wpex_before_footer' => esc_html__( 'Before Footer', 'wpex-new-york' ),
	) );
}
add_action( 'after_setup_theme', 'wpex_register_menus' );