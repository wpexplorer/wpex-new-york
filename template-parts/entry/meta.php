<?php
/**
 * Outputs post meta
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// NOTE: Not used in the theme by default - included for your convenience!

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// Get meta blocks
$blocks = array( 'date', 'author', 'categories', 'comments' );
$blocks = apply_filters( 'wpex_entry_meta_blocks', $blocks );

// Make sure we have blocks and it's an array
if ( ! empty( $blocks ) && is_array( $blocks ) ) : ?>

	<ul class="wpex-meta wpex-clr">

		<?php
		// Loop through meta sections
		foreach ( $blocks as $block ) : ?>

			<?php
			// Date
			if ( 'date' == $block ) : ?>

				<li class="wpex-meta-date"><span class="fa fa-clock-o" aria-hidden="true"></span><time class="updated" datetime="<?php esc_attr( the_date( 'Y-m-d' ) ); ?>"<?php wpex_schema_markup( 'publish_date' ); ?>><?php echo get_the_date(); ?></time></li>

			<?php
			// Author
			elseif ( 'author' == $block ) : ?>

				<li class="wpex-meta-author"><span class="fa fa-user" aria-hidden="true"></span><span class="vcard author"<?php wpex_schema_markup( 'author_name' ); ?>><span class="fn"><?php the_author_posts_link(); ?></span></span></li>

			<?php
			// Categories
			elseif ( 'categories' == $block ) :

				if ( $categories = wpex_get_post_terms() ) : ?>

					<li class="wpex-meta-category"><span class="fa fa-folder-o" aria-hidden="true"></span><?php wpex_post_terms(); ?></li>

				<?php endif; ?>

			<?php
			// Comments
			elseif ( 'comments' == $block && comments_open() && ! post_password_required() ): ?>
				
				<li class="wpex-meta-comments"><span class="fa fa-comment-o" aria-hidden="true"></span><?php comments_popup_link( esc_html__( '0 Comments', 'wpex-new-york' ), esc_html__( '1 Comment',  'wpex-new-york' ), esc_html__( '% Comments', 'wpex-new-york' ), 'comments-link' ); ?></li>

			<?php endif; ?>

		<?php endforeach; ?>

	</ul><!-- .wpex-meta -->

<?php endif; ?>