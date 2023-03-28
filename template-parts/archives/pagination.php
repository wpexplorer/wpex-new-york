<?php
/**
 * Outputs pagination
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
} ?>

<div class="wpex-page-numbers wpex-clr">

	<?php
	// Get global query
	global $wp_query;

	// Get current page
	if ( ! $current_page = get_query_var( 'paged' ) ) {
		$current_page = 1;
	}

	// Get correct permalink structure
	if ( get_option( 'permalink_structure' ) ) {
		$format = 'page/%#%/';
	} else {
		$format = '&paged=%#%';
	}

	// Args
	$args = apply_filters( 'wpex_pagination_args', array(
		'base'      => str_replace( 999999999, '%#%', html_entity_decode( get_pagenum_link( 999999999 ) ) ),
		'format'    => $format,
		'current'   => max( 1, get_query_var( 'paged') ),
		'total'     => $wp_query->max_num_pages,
		'mid_size'  => 3,
		'type'      => 'list',
		'prev_text' => '<i class="fa fa-angle-double-left" aria-hidden="true"></i></span>' . esc_html__( 'Previous', 'wpex-new-york' ),
		'next_text' => esc_html__( 'Next', 'wpex-new-york' ) . '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
	) );

	// Output pagination
	echo paginate_links( $args ); ?>

</div><!-- .page-numbers -->