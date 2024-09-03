<?php
/**
 * Main Customizer functions
 *
 * @author    WPExplorer
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Start Class
if ( ! class_exists( 'WPEX_Customizer' ) ) {
	
	class WPEX_Customizer {
		public static $panels;
		public static $settings;

		/**
		 * Start things up
		 *
		 * @version 1.0.0
		 */
		public function __construct() {

			// Get and save all panels on init
			self::$panels   = apply_filters( 'wpex_customizer_panels', null );
			self::$settings = self::pluck_settings();

			// Register and unregister Customizer settings
			add_action( 'customize_register', array( 'WPEX_Customizer', 'customize_register' ) );

			// Loop through and load CSS
			if ( apply_filters( 'wpex_has_styling_settings', false ) ) {
				add_action( 'wp_enqueue_scripts', array( 'WPEX_Customizer', 'output_css' ), 99 );
			}

		}

		/**
		 * Get customizer panels
		 *
		 * @version 1.0.0
		 */
		public static function get_panels() {
			return self::$panels;
		}

		/**
		 * Get customizer settings
		 *
		 * @version 1.0.0
		 */
		public static function get_settings() {
			return self::$settings;
		}

		/**
		 * Loop through panels and pluck out the settings
		 *
		 * @version 1.0.0
		 */
		public static function pluck_settings() {
			$panels         = self::get_panels();
			$settings_array = array();
			if ( $panels ) {
				foreach( $panels as $panel_id => $panel ) {
					foreach( $panel['sections'] as $section ) {
						foreach ( $section['settings'] as $key => $val ) {
							$settings_array[$val['id']] = $val;
						}
					}
				}
			}
			return $settings_array;
		}

		/**
		 * Registers new controls
		 * Adds new customizer panels, sections, settings & controls
		 *
		 * @link    http://codex.wordpress.org/Theme_Customization_API
		 * @since   1.0.0
		 */
		public static function customize_register( $wp_customize ) {

			// Register only during customize preview
			if ( ! is_customize_preview() ) {
				return;
			}

			// Get panels
			$panels = self::get_panels();

			// Return if $panels var is empty
			if ( empty( $panels ) ) {
				return;
			}

			// Register panels
			$panel_priority = 140; // add panels at the bottom

			// Get prefix
			$prefix = 'wpex';

			// Loop through and add panels
			foreach( $panels as $panel_id => $panel ) {

				// Add prefix to panel id
				$panel_id = $prefix .'_'. $panel_id .'_panel';

				// Register panel
				$panel_priority++;
				$description = isset( $panel['description'] ) ? $panel['description'] : null;
				$wp_customize->add_panel( $panel_id, array(
					'priority'    => $panel_priority,
					'capability'  => 'edit_theme_options',
					'title'       => $panel['title'],
					'description' => $description,
				) );

				// Loop through panel sections and add sections
				foreach( $panel['sections'] as $section_id => $section ) {

					// Section details
					$section_id = $prefix .'_'. $section_id .'_section';
					$description = isset( $section['description'] ) ? $section['description'] : null;

					// Add section
					$wp_customize->add_section( $section_id, array(
						'title'       => $section['title'],
						'panel'       => $panel_id,
						'description' => $description,
					) );

					// Loop through section settings and add settings
					$control_priority   = 0;
					foreach ( $section['settings'] as $setting ) {
						$control_priority++;
						$setting_id         = isset( $setting['id'] ) ? $prefix .'_'. $setting['id'] : '';
						$transport          = isset( $setting['transport'] ) ? $setting['transport'] : 'refresh';
						$default            = isset( $setting['default'] ) ? $setting['default'] : wpex_get_theme_mod_default( $setting['id'] );
						$sanitize_callback  = isset( $setting['sanitize_callback'] ) ? $setting['sanitize_callback'] : 'sanitize_text_field';
						$label              = isset( $setting['control']['label'] ) ? $setting['control']['label'] : '';
						$control_desc       = isset( $setting['control']['desc'] ) ? $setting['control']['desc'] : '';
						$type               = isset( $setting['control']['type'] ) ? $setting['control']['type'] : 'text';
						$choices            = isset( $setting['control']['choices'] ) ? $setting['control']['choices'] : array();
						$active_callback    = isset( $setting['control']['active_callback'] ) ? $setting['control']['active_callback'] : null;

						// If no ID continue
						if ( ! $setting_id ) {
							continue;
						}

						// Control object
						if ( isset( $setting['control']['object'] ) ) {
							$control_object = $setting['control']['object'];
						} elseif ( 'color' == $type ) {
							$control_object = 'WP_Customize_Color_Control';
						} elseif ( 'upload' == $type ) {
							$control_object = 'WP_Customize_Image_Control';
						} else {
							$control_object = false;
						}

						// Add setting and control
						$wp_customize->add_setting( $setting_id, array(
							'type'              => 'theme_mod',
							'transport'         => $transport,
							'default'           => $default,
							'sanitize_callback' => $sanitize_callback,
						) );

						if ( $control_object ) {

							$wp_customize->add_control( new $control_object ( $wp_customize, $setting_id, array(
								'label'           => $label,
								'section'         => $section_id,
								'settings'        => $setting_id,
								'priority'        => $control_priority,
								'description'     => $control_desc,
								'type'            => $type,
								'choices'         => $choices,
								'active_callback' => $active_callback,
							) ) );

						} else {

							$wp_customize->add_control( $setting_id, array(
								'label'           => $label,
								'section'         => $section_id,
								'settings'        => $setting_id,
								'priority'        => $control_priority,
								'description'     => $control_desc,
								'type'            => $type,
								'choices'         => $choices,
								'active_callback' => $active_callback,
							) );
							
						}

					 } // End foreach $section['settings']

				} // End foreach $panel['sections']

			} // END foreach $panels

		}

		/**
		 * Sanitize data
		 *
		 * @since 1.0.0
		 */
		public static function sanitize_data( $return, $data ) {

			// Hex Color
			if ( 'hex' == $return ) {
				if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $data ) ) {
					$data = $data;
				}
			}

			// Pixel
			elseif ( 'px' == $return ) {
				 $data = intval( $data );
				 $data = $data .'px';
			}

			// Font Family
			elseif ( 'font-family' == $return ) {
				 $data = "'". $data ."'";
			}

			// Return sanitized data
			return $data;

		}
		

		/**
		 * Generates inline CSS for styling options
		 *
		 * @since 1.0.0
		 */
		public static function loop_through_settings() {

			// Define vars
			$add_css = '';

			// Get settings
			$settings = self::get_settings();

			// Return if there aren't any settings
			if ( empty( $settings ) ) {
				return;
			}

			// Loop through settings and find inline_css
			foreach ( $settings as $key => $val ) {

				// If setting shouldn't output css continue on to the next
				if ( ! isset( $val['inline_css'] ) ) {
					continue;
				}

				// Check if there is a default value
				$default = isset ( $val['default'] ) ? $val['default'] : false;

				// Get theme mod value and if empty continue onto the next setting
				$theme_mod = get_theme_mod( 'wpex_'. $key, $default );

				// No mod so check next setting
				if ( ! $theme_mod ) {
					continue;
				}

				// Extract vars
				$inline_css = $val['inline_css'];

				// Make sure vars are defined
				$sanitize  = isset( $inline_css['sanitize'] ) ? $inline_css['sanitize'] : '';
				$target    = isset( $inline_css['target'] ) ? $inline_css['target'] : '';
				$alter     = isset( $inline_css['alter'] ) ? $inline_css['alter'] : '';
				$condition = isset( $inline_css['condition'] ) ? $inline_css['condition'] : '';
				$important = isset( $inline_css['important'] ) ? '!important' : false;

				// Target and alter vars are required, if they are empty continue onto the next setting
				if ( ! $target && ! $alter ) {
					continue;
				}

				// Check condition
				if ( $condition && ! call_user_func( $condition ) ) {
					continue;
				}

				// Define sanitiation check if not defined
				if ( ! $sanitize ) {
					if ( 'color' == $alter || 'background' == $alter ) {
						$sanitize = 'hex';
					}
				}

				// Save inline_css
				if ( $theme_mod ) {
					if ( is_array( $alter ) ) {
						foreach ( $alter as $key => $val ) {
							$add_css .= $target .'{ '. $val .':'. $theme_mod . $important .'; }';
						}
					} else {
						$add_css .= $target .'{ '. $alter .':'. $theme_mod . $important .'; }';
					}
				}

			}

			// Return data
			return array(
				'css' => $add_css,
			);

		}

		/**
		 * Output Needed CSS
		 *
		 * @since 1.0.0
		 */
		public static function output_css() {

			// Customizer loop
			$c_loop = self::loop_through_settings();

			// Customizer styling CSS
			if ( ! empty( $c_loop['css'] ) ) {
				$style_handle = WPEX_THEME_MAIN_STYLE_HANDLE;
				$c_loop_css   = wpex_minify_css( $c_loop['css'] );
				wp_add_inline_style( $style_handle, $c_loop_css );
			}

		}

	}
}
new WPEX_Customizer;