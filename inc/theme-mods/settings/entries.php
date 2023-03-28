<?php
/**
 * Entries settings
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

$panels['general']['sections']['entries'] = array(
	'title' => esc_html__( 'Entries', 'wpex-new-york' ),
	'settings' => array(
		array(
			'id' => 'entry_style',
			'default' => 'full',
			'control' => array(
				'label' => esc_html__( 'Entry Style', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => array(
					'full' => esc_html__( 'Full', 'wpex-new-york' ),
					'left_right' => esc_html__( 'Left/right', 'wpex-new-york' ),
					'grid' => esc_html__( 'Grid', 'wpex-new-york' ),
				),
			),
		),
		array(
			'id' => 'entry_columns',
			'default' => '2',
			'control' => array(
				'label' => esc_html__( 'Grid Columns', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => array(
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
				'active_callback' => 'wpex_cac_entry_style_is_grid'
			),
		),
		array(
			'id' => 'grid_layout_mode',
			'default' => 'fitRows',
			'control' => array(
				'label' => esc_html__( 'Grid Layout Mode', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => array(
					'fitRows' => esc_html__( 'Fit Rows', 'wpex-new-york' ),
					'masonry' => esc_html__( 'Masonry', 'wpex-new-york' ),
				),
			),
		),
		array(
			'id' => 'entry_content_display',
			'default' => 'excerpt',
			'control' => array(
				'label' => esc_html__( 'Entry Displays?', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => array(
					'excerpt' => esc_html__( 'Custom Excerpt', 'wpex-new-york' ),
					'content' => esc_html__( 'Full Content', 'wpex-new-york' ),
				),
			),
		),
		array(
			'id' => 'entry_excerpt_length',
			'default' => 60,
			'control' => array(
				'label' => esc_html__( 'Entry Excerpt Length', 'wpex-new-york' ),
				'type' => 'text',
				'desc' => esc_html__( 'How many words to display per excerpt', 'wpex-new-york' ),
				'active_callback' => 'wpex_cac_entry_has_excerpt'
			),
		),
		array(
			'id' => 'entry_thumbnail',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Entry Thumbnail', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'entry_embeds',
			'default' => false,
			'control' => array(
				'label' => esc_html__( 'Entry Embeds', 'wpex-new-york' ),
				'type' => 'checkbox',
				'desc' => esc_html__( 'Display\'s your video/audio embed on the homepage and archives instead of the featured image.', 'wpex-new-york' ),
			),
		),
	),
);