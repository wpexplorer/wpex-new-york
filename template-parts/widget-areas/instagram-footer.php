<?php
/**
 * Instagram Footer
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

if ( is_active_sidebar( 'wpex_instagram_footer' ) ) : ?>

	<div class="wpex-instagram-footer-widgets"><?php dynamic_sidebar( 'wpex_instagram_footer' ); ?></div>

<?php endif; ?>