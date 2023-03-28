<?php
/**
 * Displays the post gallery
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

// Display featured image on protected posts
if ( post_password_required() ) {
	wpex_get_template_part( 'post_thumbnail' );
	return;
}


// Display slider
if ( $images = wpex_get_gallery_ids() ) :

	// Define slider settings
	$settings = array(
		'items'       => 1,
		'autoHeight'  => true,
		'autoplay'    => false,
		'nav'         => true,
		'dots'        => true,
		'dotsEach'    => 1,
		'margin'      => 0,
		'rtl'         => wpex_is_rtl() ? true : false,
		'loop'        => true,
		'navText'     => array(
			'<span class="fa fa-chevron-left" aria-hidden="true"></span> <span class="wpex-label">' . esc_html__( 'Previous', 'wpex-new-york' ) . '</span>',
			'<span class="wpex-label">' . esc_html__( 'Next', 'wpex-new-york' ) . '</span> <span class="fa fa-chevron-right" aria-hidden="true"></span>',
		),
	); ?>

	<div class="wpex-post-media wpex-post-slider wpex-clr">

		<div class="wpex-slider owl-carousel" data-settings="<?php echo htmlentities( json_encode( $settings ) ); ?>">

			<?php
			// Loop through images
			$count = 0;
			foreach ( $images as $image ) :
				$count ++;

				// Validate attachment
				if ( false === get_post_status( $image ) ) {
					continue;
				} ?>

				<div class="wpex-slide">

					<?php
					// Display image
					echo wp_get_attachment_image( $image, 'wpex_post', false, array(
						'alt'	=> wpex_get_esc_title(),
						'title'	=> wpex_get_esc_title(),
					) ) ?>

					<?php
					// Show caption
					if ( $caption = wpex_get_attachment_data( $image, 'caption' ) ) : ?>

						<div class="wpex-caption wpex-clr">
							<span class="wpex-count"><?php echo esc_html( $count ); ?>.</span> <?php echo wp_kses_post( $caption ); ?>
						</div><!-- .wpex-caption -->

					<?php endif;?>

				</div><!-- .wpex-slide -->

			<?php endforeach; ?>


		</div><!--.wpex-slider -->

	</div><!-- .wpex-home-slider -->


<?php endif; ?>