<?php
/**
 * Entry category
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

// Standard posts only
if ( 'post' != get_post_type() ) {
	return;
} ?>

<div class="wpex-entry-category wpex-clr"><?php

	$cats = get_the_category();
	$cat  = $cats[0];

	echo '<a href="'. esc_url( get_term_link( $cats[0], 'category' ) ) .'" title="'. esc_attr( $cat->name ) .'">'. esc_html( $cat->name ) .'</a>';

?></div>