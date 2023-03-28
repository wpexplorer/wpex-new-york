<?php
/**
 * Helper functions return correct template part for action hooks
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

/**
 * Define Template parts
 *
 * @since 1.0.0
 */
function wpex_template_parts() {
	return apply_filters( 'wpex_template_parts', array(

		// Menus
		'main_menu'              => 'template-parts/menus/main',
		'before_footer_menu'     => 'template-parts/menus/before-footer',

		// Alternate widget areas
		'widgets_instagram_footer' => 'template-parts/widget-areas/instagram-footer',
		'widgets_social_footer'    => 'template-parts/widget-areas/social-footer',

		// Site Header
		'site_header'            => 'template-parts/header/layout',
		'site_header_branding'   => 'template-parts/header/branding',
		'site_header_logo'       => 'template-parts/header/logo',
		'site_header_desc'       => 'template-parts/header/description',
		'site_header_media'      => 'template-parts/header/media',

		// Archives
		'archive_thumbnail'      => 'template-parts/archives/thumbnail',
		'archive_header'         => 'template-parts/archives/header',
		'archive_description'    => 'template-parts/archives/description',
		'archive_loop'           => 'template-parts/archives/loop',
		
		// Pages
		'page_layout'   => 'template-parts/page/layout',
		'page_header'   => 'template-parts/page/header',
		'page_media'    => 'template-parts/page/media',
		'page_content'  => 'template-parts/page/content',
		'page_comments' => 'template-parts/comments',
		'page_edit'     => 'template-parts/edit',

		// Entries
		'entry'                    => 'template-parts/entry/layout',
		'entry_media'              => 'template-parts/entry/media',
		'entry_video'              => 'template-parts/entry/video',
		'entry_audio'              => 'template-parts/entry/audio',
		'entry_thumbnail'          => 'template-parts/entry/thumbnail',
		'entry_header'             => 'template-parts/entry/header',
		'entry_meta'               => 'template-parts/entry/meta',
		'entry_content'            => 'template-parts/entry/content',
		'entry_readmore'           => 'template-parts/entry/readmore',
		'entry_category'           => 'template-parts/entry/category',
		'entry_categories'         => 'template-parts/entry/categories',
		'entry_date'               => 'template-parts/entry/date',
		'entry_share'              => 'template-parts/social-share',
		'entry_details_wrap_open'  => 'template-parts/entry/details-wrap-open',
		'entry_details_wrap_close' => 'template-parts/entry/details-wrap-close',

		// Posts
		'post_layout'            => 'template-parts/post/layout',
		'post_media'             => 'template-parts/post/media',
		'post_video'             => 'template-parts/post/video',
		'post_audio'             => 'template-parts/post/audio',
		'post_thumbnail'         => 'template-parts/post/thumbnail',
		'post_gallery'           => 'template-parts/post/gallery',
		'post_header'            => 'template-parts/post/header',
		'post_meta'              => 'template-parts/post/meta',
		'post_content'           => 'template-parts/post/content',
		'post_tags'              => 'template-parts/post/tags',
		'post_author'            => 'template-parts/post/author',
		'post_related'           => 'template-parts/post/related',
		'post_comments'          => 'template-parts/comments',
		'post_next_prev'         => 'template-parts/post/next-prev',
		'post_wp_link_pages'     => 'template-parts/wp-link-pages',
		'post_edit'              => 'template-parts/edit',
		'post_share'             => 'template-parts/social-share',

		// Footer
		'site_footer'           => 'template-parts/footer/layout',
		'site_footer_widgets'   => 'template-parts/footer/widgets',
		'site_footer_bottom'    => 'template-parts/footer/bottom',
		'site_footer_copyright' => 'template-parts/footer/copyright',

		// Modules
		'pagination'       => 'template-parts/archives/pagination',
		'entry_none'       => 'template-parts/entry/none',
		'home_slider'      => 'template-parts/home/slider',
		'social_share'     => 'template-parts/social-share',
		'scrolltop_button' => 'template-parts/scrolltop-button',
		'wp_link_pages'    => 'template-parts/wp-link-pages',
		'edit_link'        => 'template-parts/edit',

	) );
}

/*-------------------------------------------------------------------------------*/
/* - Menu
/*-------------------------------------------------------------------------------*/

/**
 * Get Main Menu
 *
 * @since 1.0.0
 */
function wpex_get_main_menu() {
	wpex_get_template_part( 'main_menu' );
}

/**
 * Before footer menu
 *
 * @since 1.0.0
 */
function wpex_get_before_footer_menu() {
	wpex_get_template_part( 'before_footer_menu' );
}

/*-------------------------------------------------------------------------------*/
/* - Site Header
/*-------------------------------------------------------------------------------*/

/**
 * Get Site Header
 *
 * @since 1.0.0
 */
function wpex_get_site_header() {
	wpex_get_template_part( 'site_header' );
}

/**
 * Get Site Header
 *
 * @since 1.0.0
 */
function wpex_get_site_header_branding() {
	wpex_get_template_part( 'site_header_branding' );
}

/**
 * Get Site Header Media
 *
 * @since 1.2.0
 */
function wpex_get_site_header_media() {
	wpex_get_template_part( 'site_header_media' );
}

/*-------------------------------------------------------------------------------*/
/* - Widget Areas
/*-------------------------------------------------------------------------------*/

/**
 * Get Instagram Social Widgets
 *
 * @since 1.0.0
 */
function wpex_get_instagram_footer_widgets() {
	wpex_get_template_part( 'widgets_instagram_footer' );
}

/**
 * Get Social Footer Widgets
 *
 * @since 1.0.0
 */
function wpex_get_social_footer_widgets() {
	wpex_get_template_part( 'widgets_social_footer' );
}

/**
 * Get Site Footer Widgets
 *
 * @since 1.0.0
 */
function wpex_get_site_footer_widgets() {
	wpex_get_template_part( 'site_footer_widgets' );
}

/*-------------------------------------------------------------------------------*/
/* - Archives
/*-------------------------------------------------------------------------------*/

/**
 * Get Archive Thumbnail
 *
 * @since 1.0.0
 */
function wpex_get_archive_thumbnail() {
	wpex_get_template_part( 'archive_thumbnail' );
}

/**
 * Get Archive Header
 *
 * @since 1.0.0
 */
function wpex_get_archive_header() {
	wpex_get_template_part( 'archive_header' );
}

/**
 * Get Archive Description
 *
 * @since 1.0.0
 */
function wpex_get_archive_description() {
	wpex_get_template_part( 'archive_description' );
}


/*-------------------------------------------------------------------------------*/
/* - Site Footer
/*-------------------------------------------------------------------------------*/

/**
 * Get Site Footer
 *
 * @since 1.0.0
 */
function wpex_get_site_footer() {
	wpex_get_template_part( 'site_footer' );
}

/**
 * Get Site Footer Bottom
 *
 * @since 1.0.0
 */
function wpex_get_site_footer_bottom() {
	wpex_get_template_part( 'site_footer_bottom' );
}

/**
 * Get Site Footer Bottom Copyright
 *
 * @since 1.0.0
 */
function wpex_get_site_footer_copyright() {
	wpex_get_template_part( 'site_footer_copyright' );
}

/*-------------------------------------------------------------------------------*/
/* - Pages
/*-------------------------------------------------------------------------------*/

/**
 * Get Page Header
 *
 * @since 1.0.0
 */
function wpex_get_page_header() {
	wpex_get_template_part( 'page_header' );
}

/**
 * Get Page Thumbnail
 *
 * @since 1.0.0
 */
function wpex_get_page_thumbnail() {
	wpex_get_template_part( 'page_thumbnail' );
}

/**
 * Get Page Content
 *
 * @since 1.0.0
 */
function wpex_get_page_content() {
	wpex_get_template_part( 'page_content' );
}

/*-------------------------------------------------------------------------------*/
/* - Other
/*-------------------------------------------------------------------------------*/

/**
 * Get wp link pages
 *
 * @since 1.0.0
 */
function wpex_get_wp_link_pages() {
	wpex_get_template_part( 'wp_link_pages' );
}

/**
 * Get edit link
 *
 * @since 1.0.0
 */
function wpex_get_edit_post_link() {
	wpex_get_template_part( 'edit_link' );
}

/**
 * Social Share
 *
 * @since 1.0.0
 */
function wpex_get_social_share() {
	wpex_get_template_part( 'social_share' );
}

/**
 * Scroll to top button
 *
 * @since 1.0.0
 */
function wpex_get_scrolltop_button() {
	wpex_get_template_part( 'scrolltop_button' );
}

/**
 * Post Slider
 *
 * @since 1.0.0
 */
function wpex_get_home_slider() {
	if ( is_front_page() ) {
		wpex_get_template_part( 'home_slider' );
	}
}

/**
 * Next/Previous Links
 *
 * @since 1.0.0
 */
function wpex_get_post_next_prev() {
	if ( is_singular( 'post' ) ) {
		wpex_get_template_part( 'post_next_prev' );
	}
}