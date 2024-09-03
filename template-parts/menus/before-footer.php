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

// Display menu
wp_nav_menu( array(
	'container'       => 'nav',
	'container_class' => 'wpex-before-footer-menu wpex-clr',
	'menu_class'      => 'wpex-container',
	'theme_location'  => 'wpex_before_footer',
	'fallback_cb'     => false,
) ); ?>