<?php
/**
 * The default template for displaying post entries.
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

<<?php wpex_html_tag( 'entry_article' ); ?> id="post-<?php the_ID(); ?>" <?php post_class( wpex_get_entry_classes() ); ?>>

	<div class="wpex-entry-inner wpex-clr">

		<?php
		/**
		 * wpex_hook_full_entry_inner hook.
		 */
		do_action( 'wpex_hook_entry_inner' ); ?>

	</div><!-- .wpex-entry-inner -->

</<?php wpex_html_tag( 'entry_article' ); ?>><!-- .wpex-loop-entry -->