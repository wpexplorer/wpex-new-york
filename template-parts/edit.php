<?php
/**
 * Displays the post edit link
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

edit_post_link( esc_html__( 'Edit this', 'wpex-new-york' ), '<div class="wpex-edit">', '</div>' );