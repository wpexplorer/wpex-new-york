<?php
/**
 * Add Customizer options for WooCommerce
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

if ( ! class_exists( 'New_York_Woo_Theme_Mods' ) ) {

	class New_York_Woo_Theme_Mods {

		/**
		 * Start things up
		 *
	     * @since  1.0.0
	     * @access public
		 */
		public function __construct() {
			add_filter( 'wpex_customizer_panels', array( 'New_York_Woo_Theme_Mods', 'add_mods' ), 40 );
		}

		/**
		 * Add new customizer mods for WooCommerce
		 *
	     * @since  1.0.0
	     * @access public
		 */
		public static function add_mods( $panels ) {

			// Define vars
			$columns = array(
				'' => esc_html__( 'Default', 'wpex-new-york' ),
				1  => 1,
				2  => 2,
				3  => 3,
				4  => 4,
				5  => 5,
			);

			// Layouts
			$layouts = array(
				'right-sidebar' => esc_html__( 'Right Sidebar', 'wpex-new-york' ),
				'left-sidebar'  => esc_html__( 'Left Sidebar', 'wpex-new-york' ),
				'full-width'    => esc_html__( 'No Sidebar', 'wpex-new-york' ),
			);

			// Panels
			$panels['woo'] = array(
				'title' => esc_html__( 'WooCommerce', 'wpex-new-york' ),
				'sections' => array(

					// Shop Section
					'woo_shop' => array(
						'id' => 'woo_shop',
						'title' => esc_html__( 'Shop', 'wpex-new-york' ),
						'settings' => array(
							array(
								'id' => 'woo_shop_layout',
								'default' => 'full-width',
								'control' => array(
									'label' => esc_html__( 'Layout', 'wpex-new-york' ),
									'type' => 'select',
									'choices' => $layouts,
								),
							),
							array(
								'id' => 'woo_shop_ppp',
								'default' => 12,
								'control' => array(
									'label' => esc_html__( 'Products Per Page', 'wpex-new-york' ),
									'type' => 'number',
								),
							),
							array(
								'id' => 'woo_shop_columns',
								'default' => 4,
								'control' => array(
									'label' => esc_html__( 'Columns', 'wpex-new-york' ),
									'type' => 'select',
									'choices' => $columns,
								),
							),
							array(
								'id' => 'woo_hide_entry_rating',
								'default' => true,
								'control' => array(
									'label' => esc_html__( 'Hide Entry Ratings', 'wpex-new-york' ),
									'type' => 'checkbox',
								),
							),
							array(
								'id' => 'woo_hide_entry_cart_btn',
								'default' => true,
								'control' => array(
									'label' => esc_html__( 'Hide Entry Add To Cart Button', 'wpex-new-york' ),
									'type' => 'checkbox',
								),
							),
							array(
								'id' => 'woo_hide_onsale_badge',
								'default' => true,
								'control' => array(
									'label' => esc_html__( 'Hide Onsale Badge', 'wpex-new-york' ),
									'type' => 'checkbox',
								),
							),
						),
					),

					// Product Section
					'woo_product' =>  array(
						'id' => 'woo_product',
						'title' => esc_html__( 'Products', 'wpex-new-york' ),
						'settings' => array(
							array(
								'id' => 'woo_single_product_layout',
								'default' => 'full-width',
								'control' => array(
									'label' => esc_html__( 'Layout', 'wpex-new-york' ),
									'type' => 'select',
									'choices' => $layouts,
								),
							),
							array(
								'id' => 'woo_related_ppp',
								'default' => 4,
								'control' => array(
									'label' => esc_html__( 'Related Products Count', 'wpex-new-york' ),
									'type' => 'number',
								),
							),
							array(
								'id' => 'woo_single_loops_columns',
								'default' => 4,
								'control' => array(
									'label' => esc_html__( 'Related & Up-Sell Products Columns', 'wpex-new-york' ),
									'type' => 'select',
									'choices' => $columns,
								),
							),
						),
					),

					// Cart
					'woo_cart' =>  array(
						'id' => 'woo_product',
						'title' => esc_html__( 'Cart', 'wpex-new-york' ),
						'settings' => array(
							array(
								'id' => 'woo_redirect_empty_cart',
								'default' => true,
								'control' => array(
									'label' => esc_html__( 'Redirect Empty Cart to Shop?', 'wpex-new-york' ),
									'type' => 'checkbox',
								),
							),
						),
					),
				),
			);
			return $panels;
		}

	}

}
new New_York_Woo_Theme_Mods;