<?php
/**
 * Outputs the header media
 *
 * @package   New York WordPress Theme
 * @author    WPExplorer
 * @link      http://www.wpexplorer.com
 * @since     1.2.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( function_exists( 'the_custom_header_markup' ) ) :

	the_custom_header_markup();

endif;