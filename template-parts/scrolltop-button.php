<?php
/**
 * Scroll to top button
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

<a href="#" aria-label="<?php esc_attr_e( 'back to the top of the site', 'wpex-new-york' ); ?>" class="wpex-site-scroll-top"><span class="fa fa-angle-up" aria-hidden="true"></span></a>