<?php
/**
 * Displays homepage slider
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

// Disable on paged pages
if ( is_paged() && wpex_get_theme_mod( 'home_slider_disable_on_paginated' ) ) {
	return;
}

// Check what should display
$content = apply_filters( 'wpex_home_slider_content', wpex_get_theme_mod( 'home_slider_content' ) );

// Show custom code
if ( $custom_code = wpex_get_translated_theme_mod( 'home_slider_custom_code' ) ) {

	echo '<div class="wpex-home-slider wpex-clr">'. do_shortcode( wp_kses_post( $custom_code ) ) .'</div>';

	return;

}

// Define slider settings
$settings = apply_filters( 'wpex_home_slider_options', array(
	'slideBy'    => 1,
	'nav'        => true,
	'dots'       => true,
	'dotsEach'   => 1,
	'margin'     => 0,
	'rtl'        => wpex_is_rtl() ? true : false,
	'loop'       => true,
	'navText'    => array(
		'<span class="fa fa-angle-left" aria-hidden="true"></span>',
		'<span class="fa fa-angle-right" aria-hidden="true"></span>',
	),
	'responsive' => array(
		'0'    => array(
			'items' => 1,
		),
		'600'  => array(
			'items' => 2,
		),
		'800'  => array(
			'items' => 3,
		),
		'1400' => array(
			'items' => 4,
		),
		'2000' => array(
			'items' => 5,
		),
	),
) );

// Show homepage featured slider if theme panel category isn't blank
if ( $ids = wpex_get_home_slider_ids() ) :

	// Get posts based on featured category
	$wpex_query = new WP_Query( array(
		'post_type'           =>'post',
		'post__in'            => $ids,
		'posts_per_page'      => -1,
		'meta_key'            => '_thumbnail_id',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => true,
	) );

	if ( $wpex_query->have_posts() ) :

		if ( $wpex_query->post_count < 5 ) {
			$settings['loop'] = false;
		} ?>

		<div class="wpex-home-slider wpex-clr">

			<div class="wpex-slider owl-carousel" data-settings="<?php echo htmlentities( json_encode( $settings ) ); ?>">

				<?php
				// Loop through each post
				while ( $wpex_query->have_posts() ) : $wpex_query->the_post(); ?>

					<?php if ( has_post_thumbnail() ) : ?>

						<div class="wpex-slide">

							<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">

								<?php the_post_thumbnail( 'wpex_home_slider', array(
									'alt'	  => wpex_get_esc_title(),
									'title'	  => wpex_get_esc_title(),
									'class'   => 'wpex-slide__img',
									'loading' => false,
								) ) ?>

								<div class="entry-title wpex-clr"><?php the_title(); ?></div>

							</a>

						</div><!-- .wpex-slide -->

					<?php endif; ?>

				<?php endwhile; ?>

				<?php wp_reset_postdata(); ?>

			</div><!--.wpex-slider -->

		</div><!-- .wpex-home-slider -->

	<?php endif; ?>

<?php return; endif; ?>

<?php
// Categories slider
if ( 'categories' == $content ) : ?>

	<?php
	// Define args
	$args = apply_filters( 'wpex_home_slider_get_terms_args', array(
		'taxonomy' => 'category',
		'meta_key' => 'wpex_thumbnail',
	) );

	// Get categories
	$terms = get_terms( $args );

	// Loop through each post
	if ( $terms ) :

		$count = count( $terms );

		if ( $count < 5 ) {
			$settings['loop'] = false;
		}  ?>

		<div class="wpex-home-slider wpex-clr">

			<div class="wpex-slider owl-carousel" data-settings="<?php echo htmlentities( json_encode( $settings ) ); ?>">

				<?php foreach ( $terms as $term ) : ?>

					<?php if ( $thumbnail_id = get_term_meta( $term->term_id, 'wpex_thumbnail', true ) ) :

						$attachment_src = wp_get_attachment_image_src( $thumbnail_id, 'wpex_home_slider' );

						if ( $attachment_src ) : ?>

							<div class="wpex-slide">

								<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>">

									<img src="<?php echo esc_url( $attachment_src[0] ); ?>" alt="<?php echo esc_attr( $term->name ); ?>" />

									<div class="entry-title wpex-clr"><?php echo esc_html( $term->name ); ?></div>

								</a>

							</div><!-- .wpex-slide -->

						<?php endif; ?>

					<?php endif; ?>

				<?php endforeach; ?>

			</div><!--.wpex-slider -->

		</div><!-- .wpex-home-slider -->

	<?php endif; ?>

<?php endif; ?>