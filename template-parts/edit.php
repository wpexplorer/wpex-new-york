<?php
/**
 * Displays the post edit link
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

edit_post_link( esc_html__( 'Edit this', 'wpex-new-york' ), '<div class="wpex-edit">', '</div>' );