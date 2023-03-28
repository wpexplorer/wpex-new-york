<?php
/**
 * The template for displaying Author bios.
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

// Return if disabled
if ( ! wpex_get_theme_mod( 'post_author_info' ) ) {
	return;
}

// Display author bio only if description exists
if ( $description = get_the_author_meta( 'description' ) ) : ?>

	<div class="wpex-author-box wpex-clr">

		<div class="wpex-avatar">

			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php esc_attr( esc_html_e( 'Visit Author Page', 'wpex-new-york' ) ); ?>"><?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'wpex_author_bio_avatar_size', 90 ) ); ?></a>

		</div><!-- .wpex-author-box-avatar -->

		<div class="wpex-content wpex-clr">

			<div class="wpex-heading"><?php esc_html_e( 'Article by', 'wpex-new-york' ); ?> <?php echo strip_tags( get_the_author() ); ?></div>

			<p><?php echo wpex_sanitize( $description, 'html' ); ?></p>

			<div class="wpex-social wpex-clr">

				<?php
				// Display twitter url
				if ( $url = get_the_author_meta( 'wpex_twitter', $post->post_author ) ) { ?>

					<a href="<?php echo esc_url( $url ); ?>" title="Twitter" class="wpex-twitter" target="_blank"><span class="fa fa-twitter" aria-hidden="true"></span></a>

				<?php }

				// Display facebook url
				if ( $url = get_the_author_meta( 'wpex_facebook', $post->post_author ) ) { ?>

					<a href="<?php echo esc_url( $url ); ?>" title="Facebook" class="wpex-facebook" target="_blank"><span class="fa fa-facebook" aria-hidden="true"></span></a>

				<?php }

				// Display Linkedin url
				if ( $url = get_the_author_meta( 'wpex_linkedin', $post->post_author ) ) { ?>

					<a href="<?php echo esc_url( $url ); ?>" title="LinkedIn" class="wpex-linkedin" target="_blank"><span class="fa fa-linkedin" aria-hidden="true"></span></a>

				<?php }

				// Display pinterest plus url
				if ( $url = get_the_author_meta( 'wpex_pinterest', $post->post_author ) ) { ?>

					<a href="<?php echo esc_url( $url ); ?>" title="Pinterest" class="wpex-pinterest" target="_blank"><span class="fa fa-pinterest" aria-hidden="true"></span></a>

				<?php }

				// Display instagram plus url
				if ( $url = get_the_author_meta( 'wpex_instagram', $post->post_author ) ) { ?>

					<a href="<?php echo esc_url( $url ); ?>" title="Instagram" class="wpex-instagram" target="_blank"><span class="fa fa-instagram" aria-hidden="true"></span></a>

				<?php }

				// Website URL
				if ( $url = get_the_author_meta( 'url', $post->post_author ) ) { ?>

					<a href="<?php echo esc_url( $url ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>" target="_blank"><span class="fa fa-external-link-square" aria-hidden="true"></span></a>

				<?php } ?>

			</div><!-- .wpex-social -->

		</div><!-- .wpex-content -->

	</div><!-- .wpex-author-box -->

<?php endif; ?>