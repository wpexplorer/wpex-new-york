<?php
/**
 * The template for displaying the footer and closing elements starting in header.php
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

	<?php
	/**
	 * wpex_hook_site_wrap_bottom hook.
	 */
	do_action( 'wpex_hook_site_content_bottom' ); ?>

	</div><!-- .wpex-site-content -->

	<?php
	/**
	 * wpex_hook_site_wrap_bottom hook.
	 */
	do_action( 'wpex_hook_site_content_after' ); ?>

	<?php
	/**
	 * wpex_hook_site_wrap_bottom hook.
	 */
	do_action( 'wpex_hook_site_wrap_bottom' ); ?>

</div><!-- .wpex-site-wrap -->

<?php
/**
 * wpex_hook_site_wrap_after hook.
 */
do_action( 'wpex_hook_site_wrap_after' ); ?>

<?php wp_footer(); ?>
</body>
</html>