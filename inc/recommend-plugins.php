<?php
/**
 * Recommended plugins
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

/**
* Returns array of recommended plugins
*
* @since 1.0.0
*/
function wpex_recommended_plugins() {
	return apply_filters( 'wpex_recommended_plugins', array(
		'wpex-new-york-theme-meta' => array(
			'name'             => 'WPEX New York Theme Meta',
			'slug'             => 'wpex-new-york-theme-meta',
			'required'         => false,
			'force_activation' => false,
			'source'           => get_theme_file_uri( WPEX_INC_DIR . 'plugins/wpex-new-york-theme-meta.zip' ),
		),
		'wpex-new-york-theme-widgets' => array(
			'name'             => 'WPEX New York Theme Widgets',
			'slug'             => 'wpex-new-york-theme-widgets',
			'required'         => false,
			'force_activation' => false,
			'version'          => '1.2.1',
			'source'           => get_theme_file_uri( WPEX_INC_DIR . 'plugins/wpex-new-york-theme-widgets.zip' ),
		),
		'wpex-user-social-profiles' => array(
			'name'             => 'WPEX User Social Profiles',
			'slug'             => 'wpex-user-social-profiles',
			'required'         => false,
			'force_activation' => false,
			'version'          => '1.1',
			'source'           => get_theme_file_uri( WPEX_INC_DIR . 'plugins/wpex-user-social-profiles.zip' ),
		),
		'woocommerce'       => array(
			'name'             => 'WooCommerce',
			'slug'             => 'woocommerce',
			'required'         => false,
			'force_activation' => false,
		),
	) );
}

function wpex_tgmpa_register() {
	tgmpa( wpex_recommended_plugins(), array(
		'id'           => 'wpex_theme',
		'domain'       => 'wpex-new-york',
		'menu'         => 'install-required-plugins',
		'has_notices'  => true,
		'is_automatic' => true,
		'parent_slug'  => 'themes.php'
	) );
}
add_action( 'tgmpa_register', 'wpex_tgmpa_register' );