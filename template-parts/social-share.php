<?php
/**
 * Outputs social sharing links
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

<div class="wpex-social-share wpex-clr">
	<div class="wpex-social-share-heading"><?php esc_html_e( 'Share This Post', 'wpex-new-york' ); ?></div>
	<ul class="wpex-clr">
		<li class="wpex-twitter">
			<a href="http://twitter.com/share?text=<?php echo urlencode( esc_attr( the_title_attribute( 'echo=0' ) ) ); ?>&amp;url=<?php echo rawurlencode( esc_url( get_permalink() ) ); ?>" title="<?php esc_attr_e( 'Share on Twitter', 'wpex-new-york' ); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
				<span class="fa fa-twitter" aria-hidden="true"></span><span class="wpex-label"><?php esc_html_e( 'Tweet', 'wpex-new-york' ); ?></span>
			</a>
		</li>
		<li class="wpex-facebook">
			<a href="http://www.facebook.com/share.php?u=<?php echo rawurlencode( esc_url( get_permalink() ) ); ?>" title="<?php esc_attr_e( 'Share on Facebook', 'wpex-new-york' ); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
				<span class="fa fa-facebook" aria-hidden="true"></span><span class="wpex-label"><?php esc_html_e( 'Share', 'wpex-new-york' ); ?></span>
			</a>
		</li>
		<li class="wpex-pinterest">
			<a href="http://pinterest.com/pin/create/button/?url=<?php echo rawurlencode( esc_url( get_permalink() ) ); ?>&amp;media=<?php echo urlencode( wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>&amp;description=<?php echo urlencode( wpex_sanitize( get_the_excerpt(), 'html' ) ); ?>" title="<?php esc_attr_e( 'Share on Pinterest', 'wpex-new-york' ); ?>" rel="nofollow" onclick="javascript:window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;">
				<span class="fa fa-pinterest" aria-hidden="true"></span><span class="wpex-label"><?php esc_html_e( 'Pin it', 'wpex-new-york' ); ?></span>
			</a>
		</li>
		<li class="wpex-comment">
			<a href="<?php echo esc_url( get_comments_link( get_the_ID() ) ); ?>" title="<?php esc_attr_e( 'Comment', 'wpex-new-york' ); ?>">
				<span class="fa fa-comment" aria-hidden="true"></span><span class="wpex-label"><?php esc_html_e( 'Comment', 'wpex-new-york' ); ?></span>
			</a>
		</li>
	</ul>
</div>