<?php
/**
 * Search settings
 *
 * @package   New York WordPress Theme
 * @author    Alexander Clarke
 * @copyright Copyright (c) 2015, WPExplorer.com
 * @link      http://www.wpexplorer.com
 * @since     1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

$panels['general']['sections']['search'] = array(
	'title' => esc_html__( 'Search Results', 'wpex-new-york' ),
	'settings' => array(
		array(
			'id' => 'search_posts_only',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Search posts only.', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
	)
);