<?php
/**
 * Displays the page thumbnail
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<?php if ( has_post_thumbnail() ) : ?>

	<div class="wpex-page-thumbnail wpex-clr"><?php the_post_thumbnail( 'wpex_page' ); ?></div>

<?php endif; ?>