<?php
/**
 * Configure WooCommerce
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

// Define includes folder
define( 'WPEX_WOO_INC_DIR', WPEX_INC_DIR . 'woocommerce/inc/' );

// Declare support
add_action( 'after_setup_theme', function() {
	add_theme_support( 'woocommerce' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-lightbox' );
	add_theme_support( 'wc-product-gallery-slider' );
} );

// Remove Woo Shop title
add_filter( 'woocommerce_show_page_title', '__return_false' );

// Include functions
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-theme-mods.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-scripts.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-body-class.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-cart-menu-item.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-register-sidebars.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-layouts.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-posts-per-page.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-columns.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-archive-title.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-pagination-args.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-onsale-badge.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-product-thumbnails.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-custom-actions.php' );
require_once get_parent_theme_file_path( WPEX_WOO_INC_DIR . 'woo-redirect-empty-cart.php' );