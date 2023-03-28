<?php
/**
 * Footer bottom
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

?>

<?php
/**
 * wpex_hook_site_footer_bottom_before hook.
 */
do_action( 'wpex_hook_site_footer_bottom_before' ); ?>

<div class="wpex-footer-bottom">

	<div class="wpex-container wpex-clr">

		<?php
		/**
		 * wpex_hook_site_footer_bottom_inner hook.
		 */
		do_action( 'wpex_hook_site_footer_bottom_inner' ); ?>

	</div><!-- .wpex-container -->

</div><!-- .wpex-footer-bottom -->

<?php
/**
 * wpex_hook_site_footer_bottom_after hook.
 */
do_action( 'wpex_hook_site_footer_bottom_after' ); ?>