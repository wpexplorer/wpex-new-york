<?php
/**
 * Discussion settings
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

$panels['general']['sections']['discussion'] = array(
	'title' => esc_html__( 'Discussion', 'wpex-new-york' ),
	'settings' => array(
		array(
			'id' => 'comments_on_pages',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Comments For Pages', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'comments_on_posts',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Comments For Posts', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
	)
);