<?php
/**
 * Returns the page layout components
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

<?php
/**
 * wpex_hook_page_before hook.
 */
do_action( 'wpex_hook_page_before' ); ?>

<article class="wpex-page-article wpex-clr">

	<?php
	/**
	 * wpex_hook_page_inner hook.
	 *
	 */
	do_action( 'wpex_hook_page_inner' ); ?>

</article><!-- .wpex-page-article -->

<?php
/**
 * wpex_hook_page_after hook.
 */
do_action( 'wpex_hook_page_after' ); ?>