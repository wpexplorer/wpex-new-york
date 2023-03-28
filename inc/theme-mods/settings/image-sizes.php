<?php
/**
 * Image Sizes settings
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

$image_sizes             = array();
$get_image_sizes         = wpex_get_image_sizes();
$crop_locations          = wpex_image_crop_locations();
$crop_locations['false'] = esc_html__( 'False', 'wpex-new-york' );
$desc                    = esc_html__( 'If you alter any image sizes you will have to regenerate your thumbnails.', 'wpex-new-york' );

foreach ( $get_image_sizes as $id => $label ) {
	$image_sizes[$id .'_image_sizes'] = array(
		'title' => $label,
		'description' => $desc,
		'settings' => array(
			array(
				'id' => $id .'_thumb_width',
				'default' => '9999',
				'transport' => 'postMessage',
				'control' => array(
					'label' => esc_html__( 'Image Width', 'wpex-new-york' ),
					'type' => 'text',
				),
			),
			array(
				'id' => $id .'_thumb_height',
				'default' => '9999',
				'transport' => 'postMessage',
				'control' => array(
					'label' => esc_html__( 'Image Height', 'wpex-new-york' ),
					'type' => 'text',
				),
			),
			array(
				'id' => $id .'_thumb_crop',
				'default' => 'center-center',
				'transport' => 'postMessage',
				'control' => array(
					'label' => esc_html__( 'Crop', 'wpex-new-york' ),
					'type' => 'select',
					'choices' => $crop_locations,
				),
			),
		),
	);
}

$panels['image_sizes'] = array(
	'title' => esc_html__( 'Image Sizes', 'wpex-new-york' ),
	'desc' => esc_html__( 'By default this theme does not crop any images so you can customize your settings first and prevent unnecessary image cropping. Below you will find all the settings needed to crop the images on your site. Be sure to install a regenerate plugin so you can regenerate your thumbnails whenvever you alter these values.', 'wpex-new-york' ),
	'sections' => $image_sizes,
);