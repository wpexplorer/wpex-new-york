<?php
/**
 * Schema.org markup
 *
 * @author    WPExplorer
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

/**
 * Returns correct schema.org markup for sections of the site
 *
 * @since 1.0.0
 */
function wpex_get_schema_markup( $location ) {

	// Defaults
	$itemscope = 'itemscope';
	$itemtype  = '';
	$schema    = '';

	// Loop through locations
	if ( 'body' == $location ) {
		$itemscope = 'itemscope';
		$itemtype  = 'http://schema.org/WebPage';
		if ( is_singular( 'post' ) ) {
			$type = "Article";
		} elseif ( is_author() ) {
			$type = 'ProfilePage';
		} elseif ( is_search() ) {
			$type = 'SearchResultsPage';
		}
		$schema = 'itemscope="'. $itemscope .'" itemtype="'. $itemtype .'"';
	} elseif ( 'header' == $location ) {
		$schema = 'itemscope role="banner" itemtype="http://schema.org/WPHeader"';
	} elseif ( 'navigation' == $location ) {
		$schema = 'itemscope itemtype="http://schema.org/SiteNavigationElement"';
	} elseif ( 'main' == $location ) {
		if ( ! is_singular( 'post' ) ) {
			$schema = 'itemprop="http://schema.org/Blog" itemscope itemtype="mainContentOfPage"';
		} else {
			$schema = 'itemscope itemtype="http://schema.org/Blog"';
		}
	} elseif ( 'sidebar' == $location ) {
		$schema = 'itemscope itemtype="http://schema.org/WPSideBar"';
	} elseif ( 'footer' == $location ) {
		$schema = 'itemscope itemtype="http://schema.org/WPFooter"';
	} elseif ( 'footer_bottom' == $location ) {
		$schema = 'role="contentinfo"';
	} elseif ( 'headline' == $location ) {
		$schema = 'itemprop="headline"';
	} elseif ( 'blog_post' == $location ) {
		//$schema = 'itemprop="blogPost" itemscope itemtype="http://schema.org/BlogPosting"';
	} elseif ( 'entry_content' == $location ) {
		$schema = 'itemprop="text"';
	} elseif ( 'publish_date' == $location ) {
		$schema = 'itemprop="datePublished"';
	} elseif ( 'author_name' == $location ) {
		$schema = 'itemprop="name"';
	} elseif ( 'author_link' == $location ) {
		$schema = 'itemprop="author" itemscope itemtype="http://schema.org/Person"';
	} elseif ( 'image' == $location ) {
		$schema = 'itemprop="image"';
	} else {
		$schema = '';
	}

	// Apply filters and return
	return apply_filters( 'wpex_get_schema_markup', $schema );

}

/**
 * Echos correct schema.org markup for sections of the site
 *
 * @since 1.0.0
 */
function wpex_schema_markup( $location ) {
	echo ' '. wpex_get_schema_markup( $location );
}

/**
 * Add schema markup to the authors post link
 *
 * @since 1.0.0
 */
function wpex_add_author_link_schema_markup( $link ) {

	// Add schema markup
	if ( $schema = wpex_get_schema_markup( 'author_link' ) ) {
		$link = str_replace( 'rel="author"', 'rel="author"'. $schema, $link );
	}

	// Return link
	return $link;

}
add_filter( 'the_author_posts_link', 'wpex_add_author_link_schema_markup' );