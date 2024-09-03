<?php
/**
 * Displays the post video
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

// Display video if defined
if ( wpex_has_post_video() ) : ?>

	<div class="wpex-post-media wpex-post-video wpex-responsive-embed wpex-clr"><?php wpex_post_video(); ?></div>
	
<?php endif; ?>