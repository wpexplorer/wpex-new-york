 <?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments and the comment
 * form. The actual display of comments is handled by a callback to
 * wpex_comment() which is located at functions/comments-callback.php
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Return if not needed
if ( post_password_required() || ( ! comments_open() && get_comment_pages_count() == 0 ) ) {
	return;
}

// Return if comments disabled
if ( ! wpex_has_comments( get_post_type() ) ) {
	return;
}

// Check if there are comments
$have_comments = have_comments(); ?>

<div id="comments" class="comments-area wpex-clr">

	<?php
	// Get comments title
	if ( $have_comments ) {
	
		$comments_number = number_format_i18n( get_comments_number() );
		if ( '1' == $comments_number ) {
			$comments_title = esc_html__( 'This Article Has 1 Comment', 'wpex-new-york' );
		} else {
			$comments_title = sprintf( esc_html__( 'This Article Has %s Comments', 'wpex-new-york' ), $comments_number );
		}

	} else {
		$comments_title = esc_html__( 'Be the first to comment', 'wpex-new-york' );
	}

	// Apply filter to title
	$comments_title = apply_filters( 'wpex_comments_title', $comments_title ); ?>

	<div class="wpex-comments-title"><?php echo esc_html( $comments_title ); ?></div>

	<div class="wpex-comments-wrap wpex-clr">

		<?php
		// Display comments if we have some
		if ( $have_comments ) :

			$args = array(
				'avatar_size' => 45
			); ?>

			<ol class="commentlist"><?php wp_list_comments( $args ); ?></ol>
			
			<?php
			// Display comment pagination
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>

				<nav class="navigation comment-navigation row wpex-clr" role="navigation">
					<h3 class="assistive-text wpex-heading"><span><?php esc_html_e( 'Comment navigation', 'wpex-new-york' ); ?></span></h3>
					<div class="wpex-clr">
						<div class="wpex-nav-previous"><?php
							previous_comments_link( esc_html__( '&larr; Older Comments', 'wpex-new-york' ) );
						?></div>
						<div class="wpex-nav-next"><?php
							next_comments_link( esc_html__( 'Newer Comments &rarr;', 'wpex-new-york' ) );
						?></div>
					</div><!-- .wpex-clr -->
				</nav>

			<?php endif; ?>

			<?php
			// Display comments closed notice
			if ( ! comments_open() ) : ?>

				<div class="comments-closed-notice wpex-clr"><?php

					esc_html_e( 'Comments are now closed.', 'wpex-new-york' );

				?></div><!-- .comments-closed-notice -->

			<?php endif; ?>

		<?php endif; // have_comments() ?>

		<?php
		// Display comment submission form
		comment_form(); ?>

	</div><!-- .wpex-comments-wrap -->

</div><!-- #comments -->