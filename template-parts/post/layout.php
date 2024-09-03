<?php
/**
 * Single post layout
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

<article class="wpex-post-article wpex-clr"<?php wpex_schema_markup( 'blog_post' ); ?>>

	<?php
	/**
	 * wpex_hook_post_inner hook.
	 */
	do_action( 'wpex_hook_post_inner' ); ?>

</article><!-- .wpex-post-article -->