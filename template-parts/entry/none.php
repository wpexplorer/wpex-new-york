<?php
/**
 * The template for displaying a "No posts found" message.
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */ ?>

<div class="wpex-entry-none">

	<?php if ( is_404() ) : ?>

		<header class="page-header wpex-clr">
			<h1 class="wpex-page-header-title">404 Page not Found</h1>
		</header>
		
	<?php endif; ?>

	<div class="wpex-entry-content wpex-content wpex-clr">

		<?php if ( is_home() ) { ?>

			<p><?php esc_html_e( 'There aren\'t any posts currently published on this site.', 'wpex-new-york' ); ?></p>

		<?php } elseif ( is_author() ) { ?>

			<p><?php esc_html_e( 'This author hasn\'t written any posts yet.', 'wpex-new-york' ); ?></p>

		<?php } elseif ( is_search() ) { ?>

			<p><?php esc_html_e( 'Sorry, but nothing matched your search terms', 'wpex-new-york' ); ?>: <span>"<?php echo esc_html( get_search_query( false ) ); ?>"</span></p>

		<?php } elseif ( is_category() ) { ?>

			<p><?php esc_html_e( 'There aren\'t any posts currently published in this category.', 'wpex-new-york' ); ?></p>

		<?php } elseif ( is_tax() ) { ?>

			<p><?php esc_html_e( 'There aren\'t any posts currently published under this taxonomy.', 'wpex-new-york' ); ?></p>

		<?php } elseif ( is_tag() ) { ?>

			<p><?php esc_html_e( 'There aren\'t any posts currently published under this tag.', 'wpex-new-york' ); ?></p>

		<?php } elseif ( is_404() ) { ?>
		
			<p><?php esc_html_e( 'Unfortunately, the page you are looking for can not be found. You can use the  search form below to try and find what you were looking for.', 'wpex-new-york' ); ?></p>

			<?php get_search_form(); ?>

		<?php } else { ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for.', 'wpex-new-york' ); ?></p>

		<?php } ?>

	</div><!-- .wpex-entry-content -->

</div><!-- .wpex-entry-none -->