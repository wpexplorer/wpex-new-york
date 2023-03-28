<?php
/**
 * Main theme setup. Loads all core theme functions and classes.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 *
 * For more information on hooks, actions, and filters,
 * see http://codex.wordpress.org/Plugin_API
 *
 * Text Domain: wpex-new-york
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      https://www.wpexplorer.com
 * @since     1.0.0
 *
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class New_York_Theme_Setup {

	/**
	 * Start things up
	 *
     * @since  1.0.0
     * @access public
	 */
	public function __construct() {

		// Define constants
		self::define_constants();

		// Load files
		self::load_files();

		// Main theme Setup
		add_action( 'after_setup_theme', array( 'New_York_Theme_Setup', 'setup' ) );

		// Add block editor styles
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_block_editor_assets' ) );
	}

	/**
	 * Define constants
	 *
     * @since  1.0.0
     * @access public
	 */
	public static function define_constants() {
		define( 'WPEX_THEME_VERSION', '2.4' );
		if ( ! defined( 'WPEX_THEME_NAME' ) ) {
			define( 'WPEX_THEME_NAME', 'New York' );
		}
		define( 'WPEX_FRAMEWORK_DIR', '/inc/wpex-framework/' );
		define( 'WPEX_INC_DIR', '/inc/' );
		define( 'WPEX_THEME_MAIN_STYLE_HANDLE', 'style' );
		define( 'WPEX_THEME_MAIN_JS_HANDLE', 'wpex-main' );
	}

	/**
	 * Include functions and classes
	 *
     * @since  1.0.0
     * @access public
	 */
	public static function load_files() {

		// Prevent update checks
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'disable-wp-update-check.php' );

		// Add Theme meta generator
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'meta-generator.php' );

		// Include main framework functions
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'constants.php' );
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'helpers.php' ); // must load before conditionals
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'conditionals.php' );

		// Theme actions
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'hooks/partials.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'hooks/actions.php' );

		// Theme Specifc Functions
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'recommend-plugins.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'enqueue-css.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'enqueue-js.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'google-fonts.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'menus.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'image-sizes.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'layouts.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'home-slider-ids.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'pre-get-posts.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'register-sidebars.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'body-class.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'advanced-styles.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'html-tags.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'archive-title.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'archive-wrap-classes.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'archive-wrap-data.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'more-link.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'responsive-embeds.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'comments.php' );

		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'blocks-entry.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'blocks-post.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'blocks-page.php' );

		// WooCommerce Tweaks
		if ( WPEX_WOOCOMMERCE_ACTIVE ) {
			require_once get_parent_theme_file_path( WPEX_INC_DIR . 'woocommerce/woocommerce.php' );
		}

		// Theme functions that should be last
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'theme-mods/callbacks.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'theme-mods/register.php' );
		require_once get_parent_theme_file_path( WPEX_INC_DIR . 'theme-mods/translatable-strings.php' );

		// Framework Classes/Functions
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'dashboard-thumbnails.php' );
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'tgmpa/class-tgm-plugin-activation.php' );
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'customizer.php' );
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'schema.php' );
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'image-sizes.php' );
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'font-awesome/font-awesome.php' );
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'theme-mod-translations.php' );
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'move-comment-form-fields.php' );

		// Other filters
		require_once get_parent_theme_file_path( WPEX_FRAMEWORK_DIR . 'disable-wp-gallery-styles.php' );

	}

	/**
	 * Functions called during each page load, after the theme is initialized
	 * Perform basic setup, registration, and init actions for the theme
	 *
     * @since  1.0.0
     * @access public
	 *
	 * @link   http://codex.wordpress.org/Plugin_API/Action_Reference/after_setup_theme
	 */
	public static function setup() {

		// Define content_width variable
		if ( ! isset( $content_width ) ) {
			$content_width = 1040;
		}

		// Localization support
		load_theme_textdomain( 'wpex-new-york', get_template_directory() . '/languages' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add support for custom backgrounds
		add_theme_support( 'custom-background' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for editor styles.
		add_theme_support( 'editor-styles' );

		// Enqueue editor styles.
		add_editor_style( 'style-editor.css' );

		// Add support for Block Styles.
		//add_theme_support( 'wp-block-styles' );

		// Custom header disabled by default
		if ( apply_filters( 'wpex_custom_header', false ) ) {
			add_theme_support( 'custom-header', array(
				'video' => true,
				'video-active-callback' => '__return_true',
			) );
		}

		// Add support for page excerpts
		add_post_type_support( 'page', 'excerpt' );

	}

	/**
	 * Editor styles
	 *
	 * @since 1.8
	 */
	public function enqueue_block_editor_assets() {
		if ( ! get_theme_mod( 'wpex_disable_google_fonts', false ) ) {
			wp_enqueue_style(
				'wpex-pt-serif',
				'https://fonts.googleapis.com/css?family=PT+Serif:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,latin-ext'
			);
		}
	}

}
new New_York_Theme_Setup;