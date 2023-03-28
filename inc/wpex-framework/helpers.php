<?php
/**
 * Core functions used for the theme
 *
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

/**
 * Returns meta viewport
 *
 * @since 1.0.0
 */
function wpex_get_meta_viewport() {
	return apply_filters(
		'wpex_get_meta_viewport',
		'width=device-width, initial-scale=1, maximum-scale=1'
	);
}

/**
 * Returns main stylesheet handle
 *
 * @since 1.0.0
 */
function wpex_get_main_style_handle() {
	$handle = defined( 'WPEX_THEME_MAIN_STYLE_HANDLE' ) ? WPEX_THEME_MAIN_STYLE_HANDLE : 'style';
	return apply_filters( 'wpex_get_main_style_handle', $handle );
}

/**
 * Returns main js handle
 *
 * @since 1.0.0
 */
function wpex_get_main_js_handle() {
	$handle = defined( 'WPEX_THEME_MAIN_JS_HANDLE' ) ? WPEX_THEME_MAIN_JS_HANDLE : 'wpex-main';
	return apply_filters( 'wpex_get_main_js_handle', $handle );
}

/**
 * Return correct assets url for loading scripts
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'wpex_asset_url' ) ) {
	function wpex_asset_url( $part = '' ) {
		return get_template_directory_uri() .'/assets/'. $part;
	}
}

/**
 * Returns theme mod
 *
 * @since 1.0.0
 */
function wpex_get_theme_mod( $key, $fallback = false ) {
	$default = wpex_get_theme_mod_default( $key );
	$value   = get_theme_mod( 'wpex_'. $key, $default );
	if ( ! $value && $fallback ) {
		return $default;
	} else {
		return $value;
	}
}

/**
 * Returns theme mod default
 *
 * @since 1.0.0
 */
function wpex_get_theme_mod_default( $key = '' ) {
	$settings = WPEX_Customizer::get_settings();
	if ( ! empty( $settings[$key]['default'] ) ) {
		return $settings[$key]['default'];
	}
}

/**
 * Echos theme mod
 *
 * @since 1.0.0
 */
function wpex_theme_mod( $key, $default = '' ) {
	echo wpex_get_theme_mod( $key, $default );
}

/**
 * Retrives a theme mod value and translates it
 * Note :   Translated strings do not have any defaults in the Customizer
 *          Because they all have localized fallbacks.
 *
 * @since 1.1.0
 */
function wpex_get_translated_theme_mod( $id ) {
    return wpex_translate_theme_mod( $id, wpex_get_theme_mod( $id ) );
}

/**
 * Provides translation support for plugins such as WPML for theme_mods
 *
 * @since 1.1.0
 */
function wpex_translate_theme_mod( $id = '', $val = '' ) {

	// Sanitize id
	$id = $id ? 'wpex_'. $id : '';

    // Translate theme mod val
    if ( $val && $id ) {

        // WPML translation
        if ( function_exists( 'icl_t' ) ) {
            $val = icl_t( 'Theme Mod', $id, $val );
        }

        // Polylang Translation
        elseif ( function_exists( 'pll__' ) ) {
            $val = pll__( $val );
        }

        // Return the value
        return $val;

    }

}

/**
 * Returns correct template part
 *
 * @since 1.0.0
 */
function wpex_get_template_part( $slug = '', $name = '' ) {
	if ( $slug && function_exists( 'wpex_template_parts' ) ) {
		$parts = wpex_template_parts();
		if ( isset( $parts[$slug] ) ) {
			get_template_part( $parts[$slug], $name );
		}
	}
}

/**
 * Loops through and outputs entry blocks
 *
 * @since 1.0.0
 */
function wpex_output_entry_blocks() {

	// Get blocks
	$blocks = wpex_get_entry_blocks();

	// Loop through blocks and get template parts
	if ( $blocks && is_array( $blocks ) ) {

		foreach ( $blocks as $id => $label ) {

			wpex_get_template_part( 'entry_'. $id );

		}

	}

}

/**
 * Loops through and outputs post blocks
 *
 * @since 1.0.0
 */
function wpex_output_post_blocks() {

	// Get blocks
	$blocks = wpex_get_post_blocks();

	// Loop through blocks and get template parts
	if ( $blocks && is_array( $blocks ) ) {

		foreach ( $blocks as $id => $label ) {

			wpex_get_template_part( 'post_'. $id );

		}

	}

}

/**
 * Loops through and outputs page blocks
 *
 * @since 1.0.0
 */
function wpex_output_page_blocks() {

	// Get blocks
	$blocks = wpex_get_page_blocks();

	// Loop through blocks and get template parts
	if ( $blocks && is_array( $blocks ) ) {

		foreach ( $blocks as $id => $label ) {

			wpex_get_template_part( 'page_'. $id );

		}

	}

}

/**
 * Returns correct sidebar
 *
 * @since 1.0.0
 */
function wpex_get_main_sidebar() {
	$sidebar = 'wpex_sidebar';
	if ( is_singular( 'page' ) && is_active_sidebar( 'sidebar_pages' ) ) {
		$sidebar = 'wpex_sidebar_pages';
	} elseif ( function_exists( 'is_woocommerce' ) && is_woocommerce() && is_active_sidebar( 'wpex_sidebar_woocommerce' ) ) {
		$sidebar = 'wpex_sidebar_woocommerce';
	}
	return apply_filters( 'wpex_get_main_sidebar', $sidebar );
}

/**
 * Returns theme image sizes
 *
 * @since 1.0.0
 */
function wpex_get_image_sizes() {
	return apply_filters( 'wpex_get_image_sizes', array() );
}

/**
 * Returns correct ID for any object
 * Used to fix issues with translation plugins such as WPML
 *
 * @since 1.0.0
 */
function wpex_parse_obj_id( $id = '', $type = 'page' ) {

	// WPML Check
	if ( WPEX_WPML_ACTIVE ) {
		$id = apply_filters( 'wpml_object_id', $id, $type, true );
	}

	// Polylang check
	if ( WPEX_POLYLANG_ACTIVE ) {
		if ( 'page' == $type || 'post' == $type ) {
			$id = pll_get_post( $pageid );
		} elseif ( 'term' == $type && function_exists( 'pll_get_term' ) ) {
			$id = pll_get_term( $id );
		}
	}

	// Return ID
	return $id;

}

/**
 * Array of image crop locations
 *
 * @link 2.0.0
 */
function wpex_image_crop_locations() {
	return array(
		'left-top'      => esc_html__( 'Top Left', 'wpex-new-york' ),
		'right-top'     => esc_html__( 'Top Right', 'wpex-new-york' ),
		'center-top'    => esc_html__( 'Top Center', 'wpex-new-york' ),
		'left-center'   => esc_html__( 'Center Left', 'wpex-new-york' ),
		'right-center'  => esc_html__( 'Center Right', 'wpex-new-york' ),
		'center-center' => esc_html__( 'Center Center', 'wpex-new-york' ),
		'left-bottom'   => esc_html__( 'Bottom Left', 'wpex-new-york' ),
		'right-bottom'  => esc_html__( 'Bottom Right', 'wpex-new-york' ),
		'center-bottom' => esc_html__( 'Bottom Center', 'wpex-new-york' ),
	);
}

/**
 * Parse image crop option and returns correct value for add_image_size
 *
 * @link 1.0.0
 */
function wpex_parse_image_crop( $crop = 'true' ) {
	$return = true;
	if ( 'false' == $crop ) {
		return false;
	}
	if ( $crop && is_string( $crop ) && array_key_exists( $crop, wpex_image_crop_locations() ) ) {
		$return = explode( '-', $crop );
	}
	$return = $return ? $return : false; // default is false
	return $return;
}

/**
 * Get first post with featured image in current query
 *
 * @since 1.0.0
 */
function wpex_get_first_post_with_thumb( $query = '' ) {
	if ( ! $query ) {
		global $wp_query;
		$query = $wp_query;
	}
	$posts = $query->posts;
	$posts_count = count( $posts );
	if ( $posts_count == 0 ) {
		return;
	}
	$post_with_thumb = 0;
	foreach ( $posts as $post ) {
		if ( has_post_thumbnail( $post->ID ) ) {
			$post_with_thumb = $post->ID;
			break;
		}
	}
	return intval( apply_filters( 'wpex_get_first_post_with_thumb', $post_with_thumb ) );
}

/**
 * Returns correct header logo dimensions
 *
 * @since 3.0
 */
function wpex_get_header_logo_dims() {
	$dims = [
		'height' => '',
		'width'  => '',
	];
	$logo = wpex_get_header_logo_src();
	if ( $logo ) {
		$attachment = attachment_url_to_postid( $logo );
		if ( $attachment ) {
			$attachment_data = wp_get_attachment_metadata( $attachment );
			if ( $attachment_data ) {
				$dims['height'] = $attachment_data['height'] ?? '';
				$dims['width'] = $attachment_data['width'] ?? '';
			}
		}
	}
	return $dims;
}

/**
 * Returns correct header logo src
 *
 * @since 1.0.0
 */
function wpex_get_header_logo_src() {
	return apply_filters( 'wpex_header_logo_src', wpex_get_translated_theme_mod( 'logo' ) );
}

/**
 * Returns correct header retina logo src
 *
 * @since 3.0
 */
function wpex_get_header_logo_retina_src() {
	return apply_filters( 'wpex_header_logo_retina_src', wpex_get_translated_theme_mod( 'logo_retina' ) );
}

/**
 * Returns escaped post title
 *
 * @since 1.0.0
 */
function wpex_get_esc_title() {
	return esc_attr( the_title_attribute( 'echo=0' ) );
}

/**
 * Outputs escaped post title
 *
 * @since 1.0.0
 */
function wpex_esc_title() {
	echo wpex_get_esc_title();
}

/**
 * Returns current page or post ID
 *
 * @since 1.0.0
 */
function wpex_get_the_id() {

	// Define ID
	$id = '';

	// If singular get_the_ID
	if ( is_singular() ) {
		$id = get_the_ID();
	}

	// Get ID of WooCommerce product archive
	elseif ( is_post_type_archive( 'product' ) && function_exists( 'wc_get_page_id' ) ) {
		$shop_id = wc_get_page_id( 'shop' );
		if ( isset( $shop_id ) ) {
			$id = wc_get_page_id( 'shop' );
		}
	}

	// Posts page
	elseif ( is_home() && $page_for_posts = get_option( 'page_for_posts' ) ) {
		$id = $page_for_posts;
	}

	// Return ID
	return $id;

}

/**
 * Returns available column options
 *
 * @since 1.0.0
 */
function wpex_get_column_options() {
	return apply_filters( 'wpex_get_column_options', array( '1', '2', '3', '4', '5', '6', '8', '9', '10' ) );
}

/**
 * Returns available column gap options
 *
 * @since 1.0.0
 */
function wpex_get_column_gap_options() {
	return apply_filters( 'wpex_get_column_gap_options', array(
		'0px' => '0',
		'1'   => '1',
		'5'   => '5',
		'10'  => '10',
		'20'  => '20',
		'30'  => '30',
		'40'  => '40',
		'50'  => '50',
		'60'  => '60',
	) );
}

/**
 * Returns correct footer widget columns
 *
 * @since 1.0.0
 */
function wpex_get_footer_widget_columns() {
	$cols = wpex_get_theme_mod( 'footer_widget_columns' );
	$cols = ( $cols < 7 ) ? $cols : 4;
	return apply_filters( 'wpex_get_footer_widget_columns', $cols );
}

/**
 * Returns correct entry style
 *
 * @since 1.0.0
 */
function wpex_get_entry_style() {
	if ( ! empty( $_GET['entry_style'] ) ) {
		return wp_strip_all_tags( $_GET['entry_style'] );
	}
	return apply_filters( 'wpex_get_entry_style', wpex_get_theme_mod( 'entry_style' ) );
}

/**
 * Returns number of columns for grid type archive
 *
 * @since 1.0.0
 */
function wpex_get_loop_columns( $current_query = 'archive' ) {

	// Check url params
	if ( ! empty( $_GET['columns'] ) ) {
		return intval( $_GET['columns'] );
	}

	// Get customizer columns for grid styles
	if ( 'grid' == wpex_get_entry_style() ) {
		$columns = wpex_get_theme_mod( 'entry_columns' );
	}

	// Return 1 for non grid styles
	else {
		$columns = 1;
	}

	// Get columns and apply filter
	$columns = apply_filters( 'wpex_loop_columns', $columns, $current_query );

	// Sanitize
	$columns = intval( $columns );
	$columns = ( $columns && $columns !== 0 ) ? $columns : 1;

	// Return columns
	return $columns;

}

/**
 * Returns correct entry classes
 *
 * @since 1.0.0
 */
function wpex_get_entry_classes( $context = '' ) {

	// Base classes for entry
	$classes = array( 'wpex-entry' );

	// Check for media
	$has_video = wpex_has_post_video();
	$has_audio = wpex_has_post_audio();

	// Get entry style
	$entry_style = wpex_get_entry_style();
	$entry_style = str_replace( '_', '-', $entry_style );
	$classes[]   = 'wpex-style-'. $entry_style;

	// Grid style entry classes
	if ( 'grid' == $entry_style ) {
		$columns   =  wpex_get_loop_columns( $context );
		$classes[] = 'wpex-masonry-item';
		$classes[] = 'wpex-col';
		$classes[] = 'wpex-col-'. $columns;
	}

	// Add counter
	global $wpex_count;
	if ( $wpex_count ) {
		$classes[] = 'wpex-count-'. $wpex_count;
	}

	// Apply filters and return
	return apply_filters( 'wpex_entry_classes', $classes, $context );

}

/**
 * Returns current layout
 *
 * @since 1.0.0
 */
function wpex_get_main_layout() {

	// Check URL
	if ( ! empty( $_GET['layout'] ) ) {
		return esc_html( $_GET['layout'] );
	}

	// Get post ID
	$post_id = wpex_get_the_id();

	// Set layout var
	$layout = '';

	// Homepage
	if ( is_home() || is_front_page() ) {

		$layout = wpex_get_theme_mod( 'home_layout' );

	}

	// Posts
	elseif ( is_page() ) {

		$layout = wpex_get_theme_mod( 'page_layout' );

	}

	// Posts
	elseif ( is_singular() ) {

		$layout = wpex_get_theme_mod( 'post_layout' );

	}

	// Full-width pages
	if ( is_404() ) {

		$layout = wpex_get_theme_mod( 'error_404_layout' );

	}

	// Search
	elseif ( is_search() ) {

		$layout = wpex_get_theme_mod( 'search_layout' );

	}

	// Archive
	elseif ( is_archive() ) {

		$layout = wpex_get_theme_mod( 'archives_layout' );

	}

	// Apply filters
	$layout = apply_filters( 'wpex_get_main_layout', $layout );

	// Check meta, must go after filters
	if ( $meta = get_post_meta( wpex_get_the_id(), 'wpex_post_layout', true ) ) {
		$layout = $meta;
	}

	// Sanitize
	$layout = $layout ? esc_html( $layout ) : 'right-sidebar';

	// Return layout
	return $layout;

}

/**
 * Returns target blank
 *
 * @since 1.0.0
 */
function wpex_get_target_blank( $target = '' ) {
	if ( 'blank' == $target || '_blank' == $target ) {
		return ' target="_blank"';
	}
}

/**
 * Echos target blank
 *
 * @since 1.0.0
 */
function wpex_target_blank( $target = '' ) {
	echo wpex_get_target_blank( $target );
}

/**
 * Sanitizes data
 *
 * @since 1.0.0
 */
function wpex_sanitize( $data = '', $type = null ) {

	// Advertisement
	if ( 'advertisement' == $type ) {
		return $data;
	}

	// URL
	elseif ( 'url' == $type ) {
		$data = esc_url( $data );
	}

	// CSS
	elseif ( 'css' == $type ) {
		$data = $data; // nothing yet
	}

	// Image
	elseif ( 'img' == $type || 'image' == $type ) {
		$data = wp_kses( $data, array(
			'img'       => array(
				'src'   => array(),
				'alt'   => array(),
				'title' => array(),
				'data'  => array(),
				'id'    => array(),
				'class' => array(),
			),
		) );
	}

	// Link
	elseif ( 'link' == $type ) {
		$data = wp_kses( $data, array(
			'a'         => array(
				'href'  => array(),
				'title' => array(),
				'rel'   => array(),
				'class' => array(),
				'data'  => array(),
				'id'    => array(),
			),
		) );
	}

	// HTML
	elseif ( 'html' == $type ) {
		$data = wp_specialchars_decode( wp_kses_post( $data ) );
	}

	// Pixel or Percent
	elseif ( 'px_pct' == $type ) {
        if ( 'none' == $data || '0px' == $data ) {
            return '0';
        } elseif ( strpos( $data, '%' ) ) {
            return $data;
        } elseif ( strpos( $data , '&#37;' ) ) {
        	return $data;
        } elseif ( $data = floatval( $data ) ) {
            return $data .'px';
        }
    }

	// Videos
	elseif ( 'video' == $type || 'audio' == $type || 'embed' ) {
		$data = wp_kses( $data, array(
			'iframe' => array(
				'src'               => array(),
				'type'              => array(),
				'allowfullscreen'   => array(),
				'allowscriptaccess' => array(),
				'height'            => array(),
				'width'             => array()
			),
			'embed' => array(
				'src'               => array(),
				'type'              => array(),
				'allowfullscreen'   => array(),
				'allowscriptaccess' => array(),
				'height'            => array(),
				'width'             => array()
			),
		) );
	}

	// Apply filters and return
	return apply_filters( 'wpex_sanitize', $data );

}

/**
 * Checks a custom field value and returns the type (embed, oembed, etc )
 *
 * @since 1.0.0
 */
function wpex_check_meta_type( $value ) {
	if ( strpos( $value, 'embed' ) ) {
		return 'embed';
	} elseif ( strpos( $value, 'iframe' ) ) {
		return 'iframe';
	} else {
		return 'url';
	}
}

/**
 * Return correct html tag based on context
 *
 * @since 1.0.0
 */
function wpex_get_html_tag( $context = '' ) {
	if ( $context ) {
		if ( 'entry_article' == $context ) {
			$tag = 'article';
		} elseif ( 'entry_title' == $context ) {
			$tag = 'h2';
		} else {
			$tag = 'div';
		}
		return apply_filters( 'wpex_get_html_tag', $tag, $context );
	}
}

/**
 * Echo wpex_get_html_tag function
 *
 * @since 1.0.0
 */
function wpex_html_tag( $context = '' ) {
	echo wpex_get_html_tag( $context );
}

/**
 * Returns correct entry excerpt length
 *
 * @since 1.0.0
 */
function wpex_get_entry_excerpt_length() {
	if ( isset( $_GET['excerpt_length'] ) ) {
		return esc_html( $_GET['excerpt_length'] );
	}
	return wpex_get_theme_mod( 'entry_excerpt_length' );
}

/**
 * Custom excerpts based on wp_trim_words
 * Created for child-theming purposes
 *
 * @link  http://codex.wordpress.org/Function_Reference/wp_trim_words
 * @since 1.0.0
 */
function wpex_get_excerpt( $args = array() ) {

	// Defaults
	$defaults = array(
		'post'            => '',
		'post_id'         => '',
		'length'          => wpex_get_entry_excerpt_length(),
		'readmore'        => false,
		'readmore_text'   => esc_html__( 'read more', 'wpex-new-york' ),
		'readmore_after'  => '',
		'custom_excerpts' => true,
		'disable_more'    => false,
	);

	// Apply filters
	$defaults = apply_filters( 'wpex_get_excerpt_defaults', $defaults );

	// Parse args and extract
	extract( wp_parse_args( $args, $defaults ) );

	// Get global post data
	if ( ! $post ) {
		global $post;
	}

	// Get post ID
	$post_id = $post->ID;

	// Check for custom excerpt
	if ( $custom_excerpts && has_excerpt( $post_id ) ) {
		$output = $post->post_excerpt;
	}

	// No custom excerpt...so lets generate one
	else {

		// Redmore text
		$readmore_text = esc_html( get_theme_mod( 'entry_readmore_text', $readmore_text ) );

		// Readmore link
		$readmore_link = '<a href="'. get_permalink( $post_id ) .'" title="'. $readmore_text .'" class="wpex-readmore">'. $readmore_text . $readmore_after .'</a>';

		// Check for more tag and return content if it exists
		if ( ! $disable_more && strpos( $post->post_content, '<!--more-->' ) ) {
			$output = apply_filters( 'the_content', get_the_content( $readmore_text . $readmore_after ) );
		}

		// No more tag defined so generate excerpt using wp_trim_words
		else {

			// Generate excerpt
			$output = wp_trim_words( strip_shortcodes( $post->post_content ), $length );

			// Add readmore to excerpt if enabled
			if ( $readmore ) {

				$output .= apply_filters( 'wpex_readmore_link', $readmore_link );

			}

		}

	}

	// Apply filters and echo
	return apply_filters( 'wpex_get_excerpt', $output );

}

/**
 * Echos custom excerpt
 *
 * @since 1.0.0
 */
function wpex_excerpt( $args = '' ) {
	echo wpex_get_excerpt( $args );
}

/**
 * List categories for specific taxonomy
 *
 * @link  http://codex.wordpress.org/Function_Reference/wp_get_post_terms
 * @since 1.0.0
 */

function wpex_get_post_terms( $args ) {

	// Default args
	$defaults = array(
		'taxonomy'   => 'category',
		'first_only' => false,
		'classes'    => '',
		'term_bg'    => false,
		'term_color' => false,
		'context'    => '',
	);

	// Parse args
	$args = wp_parse_args( $args, $defaults );

	// Apply filters
	$args = apply_filters( 'wpex_get_post_terms', $args, $args['context'] );

	// Extract args
	extract( $args );

	// Define return var
	$return = array();

	// Get terms
	$terms = wp_get_post_terms( get_the_ID(), $taxonomy );

	// Loop through terms and create array of links
	foreach ( $terms as $term ) {

		// Get term data
		$term_id   = $term->term_id;
		$term_name = $term->name;

		// Default classes
		$add_classes = 'wpex-term-'. $term_id;

		// Custom Classes
		if ( $classes ) {
			$add_classes .= ' '. $classes;
		}

		// Add inline CSS
		$inline_style = array();
		if ( $term_bg ) {
			$term_bg_style = wpex_term_color_inline_css( array(
				'term_id'   => $term_id,
				'target'    => 'background-color',
				'add_style' => false,
			) );
			if ( $term_bg_style ) {
				$inline_style[] = $term_bg_style;
				$add_classes .= ' wpex-term-bg';
			}
		}

		// Inline CSS output and extra classes
		if ( $inline_style ) {
			$inline_style = 'style="'. implode( ' ', $inline_style ) .'"';
		} else {
			$inline_style = '';
		}

		// Classes output
		if ( $add_classes ) {
			$add_classes = ' class="'. $add_classes .'"';
		}

		// Get permalink
		$permalink = get_term_link( $term_id, $taxonomy );

		// Add term to array
		$return[] = '<a href="'. esc_url( $permalink ) .'" title="'. $term_name .'"'. $add_classes . $inline_style .'>'. $term_name .'</a>';

	}

	// Return if no terms are found
	if ( ! $return ) {
		return;
	}

	// Return first category only
	if ( $first_only ) {

		$return = $return[0];

	}

	// Turn terms array into comma seperated list
	else {

		$return = implode( '', $return );

	}

	// Return
	return $return;

}

/**
 * Echos the wpex_get_post_terms function
 *
 * @since 1.0.0
 */
function wpex_post_terms( $taxonomy = 'category', $first_only = false, $classes = '' ) {
	echo wpex_get_post_terms( $taxonomy, $first_only, $classes );
}

/**
 * List categories for specific taxonomy without links
 *
 * @link  http://codex.wordpress.org/Function_Reference/wp_get_post_terms
 * @since 1.0.0
 */

function wpex_get_post_terms_list( $taxonomy = 'category', $first_only = false, $classes = '' ) {

	// Define return var
	$return = array();

	// Get terms
	$terms = wp_get_post_terms( get_the_ID(), $taxonomy );

	// Loop through terms and create array of links
	foreach ( $terms as $term ) {

		// Add classes
		$add_classes = 'wpex-term-'. $term->term_id;
		if ( $classes ) {
			$add_classes .= ' '. $classes;
		}
		if ( $add_classes ) {
			$add_classes = ' class="'. $add_classes .'"';
		}

		// Get permalink
		$permalink = get_term_link( $term->term_id, $taxonomy );

		// Add term to array
		$return[] = '<span'. $add_classes .'>'. $term->name .'</span>';

	}

	// Return if no terms are found
	if ( ! $return ) {
		return;
	}

	// Return first category only
	if ( $first_only ) {

		$return = $return[0];

	}

	// Turn terms array into comma seperated list
	else {

		$return = implode( '', $return );

	}

	// Return or echo
	return $return;

}

/**
 * Echos the wpex_get_post_terms_list function
 *
 * @since 1.0.0
 */
function wpex_post_terms_list( $taxonomy = 'category', $first_only = false, $classes = '' ) {
	echo wpex_get_post_terms( $taxonomy, $first_only, $classes );
}

/**
 * Returns post video
 *
 * @since 1.0.0
 */
function wpex_get_post_video( $post_id = '' ) {

	// Get post id
	$post_id = $post_id ? $post_id : get_the_ID();

	// Get video
	$video = get_post_meta( $post_id, 'wpex_post_video', true );
	$video = apply_filters( 'wpex_post_video', $video );

	// Display video if defined
	if ( $video ) :

		// Check what type of video it is
		$type = wpex_check_meta_type( $video );

		// Standard Embeds
		if ( 'iframe' == $type || 'embed' == $type ) {
			return wpex_sanitize( $video, 'video' );
		}
		// Oembeds
		elseif ( $embed = wp_oembed_get( $video ) ) {
			return $embed;
		}
		// Self hosted
		else {
			return do_shortcode( '[video src="'. $video .'"]' );
		}

	endif;
}

/**
 * Echo's post video
 *
 * @since 1.0.0
 */
function wpex_post_video( $post_id = '' ) {
	echo wpex_get_post_video( $post_id );
}

/**
 * Outputs post video
 *
 * @since 1.0.0
 */
function wpex_get_post_audio( $post_id = '' ) {

	// Get post id
	$post_id = $post_id ? $post_id : get_the_ID();

	// Get audio
	$audio = get_post_meta( $post_id, 'wpex_post_audio', true );
	$audio = apply_filters( 'wpex_post_audio', $audio );

	// Display audio if defined
	if ( $audio ) :

		// Check what type of audio it is
		$type = wpex_check_meta_type( $audio );

		// Standard Embeds
		if ( 'iframe' == $type || 'embed' == $type ) {
			return wpex_sanitize( $audio, 'audio' );
		}
		// Oembeds
		elseif ( $embed = wp_oembed_get( $audio ) ) {
			return $embed;
		}
		// Self hosted
		else {
			return do_shortcode( '[audio src="'. $audio .'"]' );
		}

	endif;
}

/**
 * Outputs post video
 *
 * @since 1.0.0
 */
function wpex_post_audio( $post_id = '' ) {
	echo wpex_get_post_audio( $post_id );
}

/**
 * Infinite scroll render function
 *
 * @since 1.0.0
 */
function wpex_infinite_scroll_render() {
	while( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/layout-entry' );
	}
}

/**
 * Minify CSS
 *
 * @since 1.0.0
 */
function wpex_minify_css( $css ) {

	// Normalize whitespace
	$css = preg_replace( '/\s+/', ' ', $css );

	// Remove ; before }
	$css = preg_replace( '/;(?=\s*})/', '', $css );

	// Remove space after , : ; { } */ >
	$css = preg_replace( '/(,|:|;|\{|}|\*\/|>) /', '$1', $css );

	// Remove space before , ; { }
	$css = preg_replace( '/ (,|;|\{|})/', '$1', $css );

	// Strips leading 0 on decimal values (converts 0.5px into .5px)
	$css = preg_replace( '/(:| )0\.([0-9]+)(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}.${2}${3}', $css );

	// Strips units if value is 0 (converts 0px to 0)
	$css = preg_replace( '/(:| )(\.?)0(%|em|ex|px|in|cm|mm|pt|pc)/i', '${1}0', $css );

	// Return minified CSS
	return trim( $css );

}

/**
 * Returns thumbnail sizes
 *
 * @since 1.0.0
 * @link  http://codex.wordpress.org/Function_Reference/get_intermediate_image_sizes
 */
function wpex_get_thumbnail_sizes( $size = '' ) {

	global $_wp_additional_image_sizes;

	$sizes = array(
		'full'  => array(
		'width'  => '9999',
		'height' => '9999',
		'crop'   => 0,
		),
	);
	$get_intermediate_image_sizes = get_intermediate_image_sizes();

	// Create the full array with sizes and crop info
	foreach( $get_intermediate_image_sizes as $_size ) {

		if ( in_array( $_size, array( 'thumbnail', 'medium', 'large' ) ) ) {

			$sizes[ $_size ]['width']   = get_option( $_size . '_size_w' );
			$sizes[ $_size ]['height']  = get_option( $_size . '_size_h' );
			$sizes[ $_size ]['crop']    = (bool) get_option( $_size . '_crop' );

		} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {

			$sizes[ $_size ] = array(
				'width'     => $_wp_additional_image_sizes[ $_size ]['width'],
				'height'    => $_wp_additional_image_sizes[ $_size ]['height'],
				'crop'      => $_wp_additional_image_sizes[ $_size ]['crop']
			);

		}

	}

	// Get only 1 size if found
	if ( $size ) {
		if ( isset( $sizes[ $size ] ) ) {
			return $sizes[ $size ];
		} else {
			return false;
		}
	}

	// Return sizes
	return $sizes;
}

/**
 * Allow to remove method for an hook when, it's a class method used and class doesn't have global for instanciation
 *
 * @since 1.0.0
 */
function wpex_remove_class_filter( $hook_name = '', $class_name ='', $method_name = '', $priority = 0 ) {
	global $wp_filter;

	// Make sure class exists
	if ( ! class_exists( $class_name ) ) {
		return false;
	}

	// Take only filters on right hook name and priority
	if ( ! isset($wp_filter[$hook_name][$priority] ) || ! is_array( $wp_filter[$hook_name][$priority] ) ) {
		return false;
	}

	// Loop on filters registered
	foreach( (array) $wp_filter[$hook_name][$priority] as $unique_id => $filter_array ) {

		// Test if filter is an array ! (always for class/method)
		if ( isset( $filter_array['function'] ) && is_array( $filter_array['function'] ) ) {

			// Test if object is a class, class and method is equal to param !
			if ( is_object( $filter_array['function'][0] )
				&& get_class( $filter_array['function'][0] )
				&& get_class( $filter_array['function'][0] ) == $class_name
				&& $filter_array['function'][1] == $method_name
			) {
				if ( isset( $wp_filter[$hook_name] ) ) {
					// WP 4.7
					if ( is_object( $wp_filter[$hook_name] ) ) {
						unset( $wp_filter[$hook_name]->callbacks[$priority][$unique_id] );
					}
					// WP 4.6
					else {
						unset( $wp_filter[$hook_name][$priority][$unique_id] );
					}
				}
			}

		}

	}
	return false;
}

/**
 * Get attachment data
 *
 * @since 1.0.0
 */
function wpex_get_attachment_data( $attachment = '', $return = 'array' ) {

	// Initial checks
	if ( ! $attachment || 'none' == $return ) {
		return;
	}

	// Return data
	if ( 'array' == $return ) {
		return array(
			'url'         => get_post_meta( $attachment, '_wp_attachment_url', true ),
			'src'         => wp_get_attachment_url( $attachment ),
			'alt'         => get_post_meta( $attachment, '_wp_attachment_image_alt', true ),
			'title'       => get_the_title( $attachment ),
			'caption'     => get_post_field( 'post_excerpt', $attachment ),
			'description' => get_post_field( 'post_content', $attachment ),
			'video'       => esc_url( get_post_meta( $attachment, '_video_url', true ) ),
		);
	} elseif ( 'url' == $return ) {
		return get_post_meta( $attachment, '_wp_attachment_url', true );
	} elseif ( 'src' == $return ) {
		return get_post_meta( $attachment, '_wp_attachment_url', true );
	} elseif ( 'alt' == $return ) {
		return get_post_meta( $attachment, '_wp_attachment_image_alt', true );
	} elseif ( 'title' == $return ) {
		return get_the_title( $attachment );
	} elseif ( 'caption' == $return ) {
		return get_post_field( 'post_excerpt', $attachment );
	} elseif ( 'description' == $return ) {
		return get_post_field( 'post_content', $attachment );
	} elseif ( 'video' == $return ) {
		return esc_url( get_post_meta( $attachment, '_video_url', true ) );
	}

}

/**
 * Returns term thumbnail_id
 *
 * @since 1.0.0
 */
function wpex_get_term_thumbnail_id( $term_id = '' ) {

	// Return if term_meta doesn't exist
	if ( ! function_exists( 'get_term_meta' ) ) {
		return;
	}

	// Loop through enabled taxonomies and get term_id
	if ( class_exists( 'WPEX_New_York_Theme_Term_Thumbnails' ) ) {
		$taxonomies = WPEX_New_York_Theme_Term_Thumbnails::taxonomies();
		if ( $taxonomies ) {
			foreach ( $taxonomies as $taxonomy ) {
				if ( ( 'category' == $taxonomy && is_category() )
					|| ( 'post_tag' == $taxonomy && is_tag() )
					|| is_tax( $taxonomy )
				) {
					$term_id = $term_id ? $term_id : get_queried_object()->term_id;
					if ( $term_id ) {
						return get_term_meta( $term_id, 'wpex_thumbnail', true );
					}
				}
			}
		}
	}

}

// Returns term thumbnail src
function wpex_get_term_thumbnail_src( $term_id = '' ) {

	// Return thumbnail ID
	if ( $thumbnail_id = wpex_get_term_thumbnail_id( $term_id  ) ) {

		// Get thumbnail attachment
		$image = wp_get_attachment_image_src( $thumbnail_id, 'wpex_archive_thumbnail' );
		$image = $image[0];

		// Return image
		return $image;

	}
}

/**
 * Check if the post has a gallery
 *
 * @since 1.0.0
 */
function wpex_post_has_gallery( $post_id = '' ) {
	if ( wpex_get_gallery_images( $post_id ) ) {
		return true;
	}
}

/**
 * Retrieve attachment IDs
 *
 * @since 1.0.0
 */
function wpex_get_gallery_ids( $post_id = '' ) {
	$post_id = $post_id ? $post_id : get_the_ID();
	$attachment_ids = get_post_meta( $post_id, '_easy_image_gallery', true );
	if ( $attachment_ids ) {
		$attachment_ids = explode( ',', $attachment_ids );
		return array_filter( $attachment_ids );
	}
}

/**
 * Get array of gallery image urls
 *
 * @since 1.0.0
 */
function wpex_get_gallery_images( $post_id = '', $size = 'full' ) {
	$ids = wpex_get_gallery_ids( $post_id );
	if ( $ids ) {
		$images = array();
		foreach ( $ids as $id ) {
			$image = wp_get_attachment_image_src( $id, $size );
			$image = isset( $image[0] ) ? $image[0] : '';
			if ( $image ) {
				$images[] = $image;
			}
		}
		return $images;
	}
}

/**
 * Retrieve attachment data
 *
 * @since 1.0.0
 */
function wpex_get_attachment( $id ) {
	$attachment = get_post( $id );
	return array(
		'alt'         => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption'     => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href'        => get_permalink( $attachment->ID ),
		'src'         => $attachment->guid,
		'title'       => $attachment->post_title,
	);
}

/**
 * Return gallery count
 *
 * @since 1.0.0
 */
function wpex_gallery_count() {
	$ids = wpex_get_gallery_ids();
	return count( $ids );
}