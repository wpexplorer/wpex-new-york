<?php
/**
 * Site width settings
 *
 * @package New York WordPress Theme
 * @author  WPExplorer
 * @link    http://www.wpexplorer.com
 * @since   1.0.0
 */

// Prevent direct file access
if ( ! defined ( 'ABSPATH' ) ) {
	exit;
}

// Site Widths
$panels['general']['sections']['site-widths'] = array(
	'title' => esc_html__( 'Site Widths', 'wpex-new-york' ),
	'settings' => array(
		array(
			'id' => 'layout_container_width',
			'control' => array(
				'label' => esc_html__( 'Container Width', 'wpex-new-york' ),
				'type' => 'text',
				'desc' => esc_html__( 'Default:', 'wpex-new-york' ) .' 1080px',
			),
		),
		array(
			'id' => 'layout_container_max_width',
			'control' => array(
				'label' => esc_html__( 'Container Max Width Percent', 'wpex-new-york' ),
				'type' => 'text',
				'active_callback' => 'wpex_is_responsive',
				'desc' => esc_html__( 'Default:', 'wpex-new-york' ) .' 92%',
			),
		),
		array(
			'id' => 'layout_content_width',
			'control' => array(
				'label' => esc_html__( 'Content Area Width', 'wpex-new-york' ),
				'type' => 'text',
				'desc' => esc_html__( 'Default:', 'wpex-new-york' ) .' 68.5%',
			),
		),
		array(
			'id' => 'layout_sidebar_width',
			'control' => array(
				'label' => esc_html__( 'Sidebar Width', 'wpex-new-york' ),
				'type' => 'text',
				'desc' => esc_html__( 'Default:', 'wpex-new-york' ) .' 30%',
			),
		),
	),
);