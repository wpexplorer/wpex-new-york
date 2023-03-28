<?php
/**
 * Outputs the page title
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

// Display the page header if it's not the front-page and it's not disabled
if ( ! is_front_page() && ! get_post_meta( get_the_ID(), 'wpex_hide_title', true ) ) : ?>

	<header class="wpex-page-header wpex-clr"><h1 class="wpex-page-header-title"><?php the_title(); ?></h1></header>

<?php endif; ?>