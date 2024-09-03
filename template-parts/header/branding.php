<?php
/**
 * Header branding output
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

<div class="wpex-site-branding wpex-clr">
	<?php wpex_get_template_part( 'site_header_logo' ); ?>
	<?php wpex_get_template_part( 'site_header_desc' ); ?>
</div><!-- .wpex-site-branding -->