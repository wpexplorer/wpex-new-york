<?php
/**
 * Layout settings
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

$panels['general']['sections']['layouts'] = array(
	'title' => esc_html__( 'Layouts', 'wpex-new-york' ),
	'description' => esc_html__( 'These are the default layouts for your site. You can always change the layout on a per post or per page basis via the meta settings.', 'wpex-new-york' ),
	'settings' => array(
		array(
			'id' => 'responsive',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Enable Responsive Design', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'home_layout',
			'default' => 'right-sidebar',
			'control' => array(
				'label' => esc_html__( 'Homepage Layout', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => $layouts,
			),
		),
		array(
			'id' => 'archives_layout',
			'default' => 'right-sidebar',
			'control' => array(
				'label' => esc_html__( 'Archives Layout', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => $layouts,
				'desc' => esc_html__( 'Categories, tags, author...etc', 'wpex-new-york' ),
			),
		),
		array(
			'id' => 'search_layout',
			'default' => 'right-sidebar',
			'transport' => 'postMessage',
			'control' => array(
				'label' => esc_html__( 'Search Layout', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => $layouts,
			),
		),
		array(
			'id' => 'post_layout',
			'default' => 'right-sidebar',
			'control' => array(
				'label' => esc_html__( 'Post Layout', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => $layouts,
			),
		),
		array(
			'id' => 'page_layout',
			'default' => 'right-sidebar',
			'control' => array(
				'label' => esc_html__( 'Page Layout', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => $layouts,
			),
		),
	),
);