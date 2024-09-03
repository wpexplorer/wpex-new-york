<?php
/**
 * The post entry title
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<header class="wpex-entry-header wpex-clr">
	<<?php wpex_html_tag( 'entry_title' ); ?> class="wpex-entry-title">
		<?php if ( is_sticky() ) : ?><span class="fa fa-bookmark"></span><?php endif; ?>
		<a href="<?php the_permalink(); ?>" title="<?php wpex_esc_title(); ?>"><?php the_title(); ?></a>
	</<?php wpex_html_tag( 'entry_title' ); ?>>
</header>