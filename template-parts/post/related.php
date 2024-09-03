<?php
/**
 * Single related posts
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

// Return if disabled
if ( ! wpex_get_theme_mod( 'post_related' ) ) {
	return;
}

// Make sure we should display related items
if ( 'post' != get_post_type() || 'on' == get_post_meta( get_the_ID(), 'wpex_disable_related', true ) ) {
	return;
}

// Get count
$posts_per_page = wpex_get_theme_mod( 'post_related_count' );
if ( ! $posts_per_page || 0 == $posts_per_page ) {
	return;
}

// Get Current post
$post_id = get_the_ID();

// What should be displayed?
$display = wpex_get_theme_mod( 'post_related_displays', true );

// Related query arguments
$args = array(
	'posts_per_page'      => $posts_per_page,
	'post__not_in'        => array( $post_id ),
	'meta_key'            => '_thumbnail_id', // Featured image required
	'ignore_sticky_posts' => true,
);
if ( 'related_tags' == $display ) {
	$tags = wp_get_post_terms( $post_id, 'post_tag' );
	$tag_ids = array();  
	foreach( $tags as $tag ) {
		$tag_ids[] = $tag->term_id; 
	}
	if ( ! empty( $tag_ids ) ) {
		$args['tag__in'] = $tag_ids;
	}
} elseif ( 'related_category' == $display ) {
	$cats = wp_get_post_terms( $post_id, 'category' );
	$cats_ids = array();  
	foreach( $cats as $cat ) {
		$cats_ids[] = $cat->term_id; 
	}
	if ( ! empty( $cats_ids ) ) {
		$args['category__in'] = $cats_ids;
	}

} elseif ( 'random' == $display ) {
	$args['orderby'] = 'rand';
}

// Apply filters to the related query for child theming
$args = apply_filters( 'wpex_related_posts_args', $args );

// Run Query
global $wpex_query;
$wpex_query = new wp_query( $args );

// Display related items
if ( $wpex_query->have_posts() ) : ?>

	<div class="wpex-related-posts wpex-clr">

		<?php
		// Display heading
		$heading = wpex_get_theme_mod( 'post_related_heading' );
		$heading = $heading ? $heading : esc_html__( 'You May Also Like', 'wpex-new-york' );
		if ( $heading ) : ?>
			<div class="wpex-related-posts-heading"><?php echo wp_kses_post( $heading ); ?></div>
		<?php endif; ?>

		<div class="wpex-row wpex-gap-24 wpex-clr">

			<?php
			// Get columns count
			$columns = wpex_get_theme_mod( 'related_entry_columns', true );

			// Loop through related posts
			$count=0;
			foreach( $wpex_query->posts as $post ) : setup_postdata( $post );
				$count++; ?>

				<div class="wpex-related-post wpex-col-nr wpex-col-<?php echo esc_attr( $columns ); ?> wpex-clr wpex-count-<?php echo esc_attr( $count ); ?>">
					<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">
						<?php the_post_thumbnail( 'wpex_entry_related' ); ?>
						<div class="wpex-date"><?php echo esc_html( get_the_date( 'M, j, Y' ) ); ?></div>
						<div class="wpex-title"><?php the_title(); ?></div>
					</a>
				</div><!-- .wpex-related-post -->

			<?php
			// Reset counter to clear floats
			if ( $columns == $count ) {
				$count = 0;
			}

			// End loop
			endforeach; ?>

		</div><!-- .wpex-row -->

	</div><!-- .wpex-related-posts -->

<?php endif;

// Reset data
wp_reset_postdata(); $wpex_query = '';