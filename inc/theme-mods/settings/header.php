<?php
/**
 * Header settings
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

$panels['general']['sections']['general'] = array(
	'title' => esc_html__( 'Header', 'wpex-new-york' ),
	'settings' => array(
		array(
			'id' => 'sticky_main_menu',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Sticky Menu', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'logo',
			'control' => array(
				'label' => esc_html__( 'Custom Logo', 'wpex-new-york' ),
				'type' => 'upload',
			),
		),
		array(
			'id' => 'logo_retina',
			'control' => array(
				'label' => esc_html__( 'Custom Retina Logo', 'wpex-new-york' ),
				'type' => 'upload',
			),
		),
		array(
			'id' => 'header_description',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Display Site Description?', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
	),
);