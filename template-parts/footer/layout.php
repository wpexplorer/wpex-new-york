<?php
/**
 * Footer Layout
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
 * wpex_hook_site_footer_before hook.
 *
 */
do_action( 'wpex_hook_site_footer_before' ); ?>

<footer class="wpex-site-footer"<?php wpex_schema_markup( 'footer' ); ?>>

	<?php
	/**
	 * wpex_hook_site_footer_inner hook.
	 *
	 * @hooked wpex_get_site_footer_widgets - 10
	 * @hooked wpex_get_site_footer_bottom  - 20
	 */
	do_action( 'wpex_hook_site_footer_inner' ); ?>

</footer><!-- .wpex-site-footer -->

<?php
/**
 * wpex_hook_site_footer_after hook.
 *
 */
do_action( 'wpex_hook_site_footer_after' ); ?>