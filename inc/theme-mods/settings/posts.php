<?php
/**
 * Posts settings
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

$panels['general']['sections']['posts'] = array(
	'title' => esc_html__( 'Posts', 'wpex-new-york' ),
	'settings' => array(
		array(
			'id' => 'post_thumbnail',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Post Thumbnail', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'post_meta',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Post Meta', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'post_tags',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Post Tags', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'post_social_share',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Post Social Share', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'post_author_info',
			'default' => true,
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Post Author Box', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'post_next_prev',
			'default' => true,
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Post Next/Previous', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'post_related',
			'default' => true,
			'control' => array(
				'label' => esc_html__( 'Post Related', 'wpex-new-york' ),
				'type' => 'checkbox',
			),
		),
		array(
			'id' => 'related_entry_columns',
			'default' => 3,
			'control' => array(
				'label' => esc_html__( 'Post Related Columns', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
				),
			),
		),
		array(
			'id' => 'post_related_displays',
			'default' => 'related_tags',
			'control' => array(
				'label' => esc_html__( 'Relate Posts by', 'wpex-new-york' ),
				'type' => 'select',
				'choices' => array(
					'related_tags' => esc_html__( 'Tags', 'wpex-new-york' ),
					'related_category' => esc_html__( 'Category', 'wpex-new-york' ),
					'random' => esc_html__( 'Random', 'wpex-new-york' ),
				),
				'active_callback' => 'wpex_cac_post_has_related',
			),
		),
		array(
			'id' => 'post_related_count',
			'default' => 6,
			'control' => array(
				'label' => esc_html__( 'Post Related: Count', 'wpex-new-york' ),
				'type' => 'number',
				'active_callback' => 'wpex_cac_post_has_related',
			),
		),
	),
);