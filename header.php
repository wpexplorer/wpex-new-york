<?php
/**
 * The Header for our theme.
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
} ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="<?php echo esc_attr( wpex_get_meta_viewport() ); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?><?php wpex_schema_markup( 'body' ); ?>>

	<?php wp_body_open(); ?>

	<?php
	/**
	 * wpex_hook_site_wrap_before hook.
	 */
	do_action( 'wpex_hook_site_wrap_before' ); ?>

	<div class="wpex-site-wrap">

		<?php
		/**
		 * wpex_hook_site_wrap_top hook.
		 *
		 */
		do_action( 'wpex_hook_site_wrap_top' ); ?>

		<?php
		/**
		 * wpex_hook_site_content_before.
		 *
		 */
		do_action( 'wpex_hook_site_content_before' ); ?>

		<div class="wpex-site-content wpex-container wpex-clr">

			<?php
			/**
			 * wpex_hook_site_content_top.
			 *
			 */
			do_action( 'wpex_hook_site_content_top' ); ?>