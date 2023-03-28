<?php
/**
 * Outputs the header logo
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

$logo      = wpex_get_header_logo_src();
$blog_name = get_bloginfo( 'name' );

?>

<div class="wpex-site-logo wpex-clr">

	<?php
	// Display image logo
	if ( $logo ) :

		$logo_html = '<img src="' . esc_url( $logo ) . '" fetchpriority="high"';

		$retina_logo = wpex_get_header_logo_retina_src();

		$srcset = '';

		if ( $retina_logo ) {
			$logo_html .= ' srcset="' . esc_url( $logo ) . ' 1x,' . esc_url( $retina_logo ) . ' 2x"';
		}

		if ( $logo_dims = wpex_get_header_logo_dims() ) {
			$logo_html .= ' height="' . $logo_dims['height'] . '" width="' . $logo_dims['width'] . '"';
		}

		$logo_html .= '>';

		?>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $blog_name ); ?>" rel="home"><?php echo $logo_html; ?></a>

	<?php
	// Text site logo
	else : ?>

		<div class="wpex-site-text-logo wpex-clr">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( $blog_name ); ?>" rel="home"><?php echo wpex_sanitize( $blog_name, 'html' ); ?></a>
		</div><!-- .wpex-site-text-logo -->

	<?php endif; ?>

</div><!-- .wpex-site-logo -->