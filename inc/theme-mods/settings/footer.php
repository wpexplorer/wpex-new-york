<?php
/**
 * Footer settings
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

$panels['general']['sections']['footer'] = array(
	'title' => esc_html__( 'Footer', 'wpex-new-york' ),
	'settings' => array(
		array(
			'id' => 'footer_copy',
			'sanitize_callback' => 'wp_kses_post',
			'control' => array(
				'label' => esc_html__( 'Custom Footer Copyright Text', 'wpex-new-york' ),
				'type' => 'textarea',
			),
		),
		array(
			'id' => 'footer_widget_columns',
			'default' => 'none',
			'control' => array(
				'label' => esc_html__( 'Footer Widgets Columns', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => array(
					'none' => esc_html__( 'None - Disable', 'wpex-new-york' ),
					1 => 1,
					2 => 2,
					3 => 3,
					4 => 4,
				),
				'desc' =>  esc_html__( 'Because of how WordPress works if you alter this option you must save the Customizer and refresh the page if you wish to use the added widget areas.', 'wpex-new-york' ),
			),
		),
	),
);