<?php
/**
 * Define correct action hooks and default template parts
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


/* Site Wrap > Top
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_site_wrap_top', 'wpex_get_main_menu', 10 );
add_action( 'wpex_hook_site_wrap_top', 'wpex_get_site_header', 20 );


/* Site Wrap > Bottom
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_site_wrap_bottom', 'wpex_get_site_footer', 10 );


/* Site Wrap > After
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_site_wrap_after', 'wpex_get_scrolltop_button', 99 );


/* Site Content > Before
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_site_content_before', 'wpex_get_home_slider', 10 );
add_action( 'wpex_hook_site_content_before', 'wpex_get_archive_thumbnail', 10 );


/* Content Area > Before
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_content_area_before', 'get_header', 10 );


/* Site Header Inner
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_site_header_inner', 'wpex_get_site_header_branding', 10 );


/* Site Header Wrap Bottom
-------------------------------------------------------------------------------*/
if ( apply_filters( 'wpex_custom_header', false ) ) {
	add_action( 'wpex_hook_site_header_wrap_bottom', 'wpex_get_site_header_media', 9999 ); // @since 1.2.0
}


/* Site Content > Top
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_content_area_top', 'wpex_get_archive_header', 10 );


/* Site Content > Bottom
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_content_area_bottom', 'get_sidebar', 50 );


/* Site Content > After
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_content_area_after', 'get_footer', 50 );
add_action( 'wpex_hook_site_content_after', 'wpex_get_post_next_prev', 10 );


/* Page > Inner
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_page_inner', 'wpex_output_page_blocks', 10 );


/* Entry > Inner
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_entry_inner', 'wpex_output_entry_blocks', 10 );


/* Post > Inner
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_post_inner', 'wpex_output_post_blocks', 10 );


/* Footer > Before
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_site_footer_before', 'wpex_get_before_footer_menu', 10 );


/* Footer > Inner
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_site_footer_inner', 'wpex_get_site_footer_widgets', 10 );


/* Footer After
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_site_footer_after', 'wpex_get_site_footer_bottom', 10 );


/* Footer Bottom > Inner
-------------------------------------------------------------------------------*/
add_action( 'wpex_hook_site_footer_bottom_inner', 'wpex_get_site_footer_copyright', 20 );