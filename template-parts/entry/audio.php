<?php
/**
 * Displays the entry audio
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

// Display audio if defined
if ( wpex_has_post_audio() ) : ?>

	<div class="wpex-loop-entry-audio wpex-loop-entry-media wpex-responsive-embed wpex-clr"><?php wpex_post_audio(); ?></div>
	
<?php endif; ?>