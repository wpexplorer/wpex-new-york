<?php
/**
 * Adds thumbnails to dashboard for posts
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

// Start Class
if ( ! class_exists( 'WPEX_Dashboard_Thumbnails' ) ) {
	
	class WPEX_Dashboard_Thumbnails {

		/**
		 * Start things up
		 *
		 * @version 1.0.0
		 */
		public function __construct() {

			if ( apply_filters( 'wpex_disable_dashboard_thumbs', false ) ) {
				return;
			}

			add_filter( 'manage_posts_columns', array( 'WPEX_Dashboard_Thumbnails', 'posts_columns' ) );
			add_filter( 'manage_posts_custom_column', array( 'WPEX_Dashboard_Thumbnails', 'posts_custom_columns' ), 10, 2 );

			$types = apply_filters( 'wpex_dashboard_thumbnails_types', array( 'page' ) );

			if ( $types && is_array( $types ) ) {
				foreach ( $types as $type ) {
					add_filter( 'manage_edit-'. $type .'_columns', array( 'WPEX_Dashboard_Thumbnails', 'posts_columns' ) );
					add_action( 'manage_'. $type .'_posts_custom_column', array( 'WPEX_Dashboard_Thumbnails', 'posts_custom_columns' ), 10, 2 );
				}
			}

		}

		/**
		 * Adds new "Featured Image" column to the WP dashboard
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @link   http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_posts_columns
		 */
		public static function posts_columns( $columns ) {
			$columns['wpex_post_thumbs'] = esc_html__( 'Featured Image', 'wpex-new-york' );
			return $columns;
		}

		/**
		 * Display post thumbnails in WP admin
		 *
		 * @since  1.0.0
		 * @access public
		 *
		 * @link   http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_posts_columns
		 */
		public static function posts_custom_columns( $column_name, $post_id ) {
			if ( $column_name != 'wpex_post_thumbs' ) {
				return;
			}
			if ( has_post_thumbnail( $post_id ) ) {
				$img_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'thumbnail', false );
				if ( ! empty( $img_src[0] ) ) { ?>
						<img src="<?php echo esc_url( $img_src[0] ); ?>" alt="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>" style="max-width:100%;max-height:90px;" />
					<?php
				}
			} else {
				echo '&mdash;';
			}
		}

	}

}
new WPEX_Dashboard_Thumbnails;