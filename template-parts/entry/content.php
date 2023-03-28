<?php
/**
 * The post entry title
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

// Check if entry has a custom excerpt
$has_custom_excerpt = wpex_has_custom_excerpt( 'entry' );

// Content classes
$classes = 'wpex-entry-content wpex-content wpex-clr';
if ( $has_custom_excerpt && strpos( get_the_content(), 'more-link' ) === false ) {
	$classes .= ' wpex-custom-excerpt';
} ?>

<div class="<?php echo esc_attr( $classes ); ?>">

	<?php
	// Display custom excerpt
	if ( $has_custom_excerpt ) :

		// Display excerpt
		wpex_excerpt( array(
			'readmore'       => true,
			'readmore_text'  => esc_html__( 'read more', 'wpex-new-york' ),
			'readmore_after' => '<span class="fa fa-angle-right" aria-hidden="true"></span>',
		) );

	// Display full content
	else :

		the_content();

	endif; ?>

</div>