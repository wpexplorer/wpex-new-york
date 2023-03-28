<?php
/**
 * Adds custom CSS to the site to tweak the main accent color
 *
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Start Class
if ( ! class_exists( 'WPEX_Accent_Class' ) ) {
	
	class WPEX_Accent_Class {

		/**
		 * Main constructor
		 *
		 * @access public
		 * @since  1.0.0
		 */
		public function __construct() {
			add_action( 'wp_enqueue_scripts', array( 'WPEX_Accent_Class', 'output_css' ) );
		}

		/**
		 * Generates arrays of elements to target
		 *
		 * @access public
		 * @since  1.0.0
		 */
		public static function arrays( $return, $accent ) {

			// Define arrays
			$texts       = apply_filters( 'wpex_accent_texts', array() );
			$backgrounds = apply_filters( 'wpex_accent_backgrounds', array() );
			$borders     = apply_filters( 'wpex_accent_borders', array() );

			// Return array
			if ( 'texts' == $return && isset( $texts[$accent] ) ) {
				return $texts[$accent];
			} elseif ( 'backgrounds' == $return && isset( $backgrounds[$accent] ) ) {
				return $backgrounds[$accent];
			} elseif ( 'borders' == $return && isset( $borders[$accent] ) ) {
				return $borders[$accent];
			}

		}

		/**
		 * Generates the CSS output
		 *
		 * @access public
		 * @since  1.0.0
		 */
		public static function generate( $accent, $default ) {

			// Get custom accent
			$color = wpex_get_theme_mod( $accent .'_accent_color' );
			$color = ( $color != $default ) ? $color : '';
			
			// Check url params
			if ( ! empty( $_GET['accent_'. $accent] ) ) {
				$color = esc_html( $_GET['accent_'. $accent] );
			}

			// Return if there isn't any accent
			if ( ! $color ) {
				return;
			}

			// Sanitize
			$color = str_replace( '#', '', $color );
			$color = '#'. $color;

			// Define css var
			$css = '';

			// Get arrays
			$texts       = self::arrays( 'texts', $accent );
			$backgrounds = self::arrays( 'backgrounds', $accent );
			$borders     = self::arrays( 'borders', $accent );

			// Texts
			if ( ! empty( $texts ) ) {
				$css .= implode( ',', $texts ) .'{color:'. $color .';}';
			}

			// Backgrounds
			if ( ! empty( $backgrounds ) ) {
				$css .= implode( ',', $backgrounds ) .'{background-color:'. $color .';}';
			}

			// Borders
			if ( ! empty( $borders ) ) {
				foreach ( $borders as $key => $val ) {
					if ( is_array( $val ) ) {
						$css .= $key .'{';
						foreach ( $val as $key => $val ) {
							$css .= 'border-'. $val .'-color:'. $color .';';
						}
						$css .= '}'; 
					} else {
						$css .= $val .'{border-color:'. $color .';}';
					}
				}
			}
			
			// Return CSS
			if ( ! empty( $css ) ) {
				return wpex_sanitize( $css, 'css' );
			}

		}

		/**
		 * Output CSS to head
		 *
		 * @access public
		 * @since  1.0.0
		 */
		public static function generate_css() {
			$accents = apply_filters( 'wpex_accents', null );
			if ( ! empty( $accents ) && is_array( $accents ) ) {
				$add_css = '';
				if ( is_array( $accents ) ) {
					foreach ( $accents as $accent => $default ) {
						$add_css .= self::generate( $accent, $default );
					}
				}
				if ( $add_css ) {
					return $add_css;
				}
			}
		}

		/**
		 * Output Accent CSS
		 *
		 * @since 1.0.0
		 */
		public static function output_css() {
			$css = sef::generate_css();
			$style_handle = function_exists( 'wpex_get_main_style_handle' ) ? wpex_get_main_style_handle() : 'style';
			if ( $css ) {
				$css = function_exists( 'wpex_minify_css' ) ? wpex_minify_css( $css ) : $css;
				wp_add_inline_style( $style_handle, $css );
			}
		}

	}

}
new WPEX_Accent_Class();