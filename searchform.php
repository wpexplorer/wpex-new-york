<?php
/**
 * The template for displaying search forms.
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

<form method="get" class="wpex-site-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" class="field" name="s" value="<?php esc_attr_e( 'Search', 'wpex-new-york' ); ?>&hellip;" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
	<button type="submit"><span class="fa fa-search" aria-hidden="true"></span><span class="screen-reader-text"><?php esc_html_e( 'Search', 'wpex-new-york' ); ?></span></button>
</form>