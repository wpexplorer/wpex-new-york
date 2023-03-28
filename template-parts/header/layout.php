<?php
/**
 * The main header layout
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
 * wpex_hook_header_wrap_before hook.
 */
do_action( 'wpex_hook_header_wrap_before' ); ?>

<div class="wpex-site-header-wrap wpex-clr"<?php wpex_schema_markup( 'header' ); ?>>

	<?php
	/**
	 * wpex_hook_site_header_wrap_top hook.
	 */
	do_action( 'wpex_hook_site_header_wrap_top' ); ?>

	<header class="wpex-site-header wpex-container wpex-clr">

		<?php
		/**
		 * wpex_hook_site_header_inner hook.
		 *
		 * @hooked wpex_get_site_header_branding - 10
		 */
		do_action( 'wpex_hook_site_header_inner' ); ?>

	</header><!-- .wpex-site-header -->

	<?php
	/**
	 * wpex_hook_site_header_wrap_bottom hook.
	 */
	do_action( 'wpex_hook_site_header_wrap_bottom' ); ?>
	
</div><!-- .wpex-site-header-wrap -->

<?php
/**
 * wpex_hook_site_header_wrap_after hook.
 */
do_action( 'wpex_hook_site_header_wrap_after' ); ?>