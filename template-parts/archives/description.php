<?php
/**
 * Archives header
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

if ( ( is_archive() || is_category() || is_tag() )
	&& ! wpex_get_term_thumbnail_src()
	&& $desc = term_description()
) : ?>

	<div class="wpex-archive-description wpex-content wpex-clr"><?php echo wp_kses_post( $desc ); ?></div>

<?php endif; ?>