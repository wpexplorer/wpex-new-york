<?php
/**
 * Register WooCommerce sidebars
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

function wpex_woo_register_sidebars() {

	register_sidebar( array(
		'name'          => esc_html__( 'WooCommerce', 'wpex-new-york' ),
		'id'            => 'wpex_sidebar_woocommerce',
		'before_widget' => '<div id="%1$s" class="widget %2$s wpex-clr">',
		'after_widget'  => '</div>',
		'before_title'  => '<'. wpex_get_html_tag( 'sidebar_widget_title' ) .' class="widget-title"><span>',
		'after_title'   => '</span></'. wpex_get_html_tag( 'sidebar_widget_title' ) .'>',
	) );

}
add_action( 'widgets_init', 'wpex_woo_register_sidebars' );