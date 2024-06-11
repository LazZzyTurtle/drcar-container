<?php
// Register Custom Post Type
function car_repair_services_coupons_post_type() {
	if ( function_exists( 'car_repair_services_options' ) ) {
		$car_repair_services = car_repair_services_options();
		if ( isset( $car_repair_services['theme_setting'] ) ) {
			$theme = $car_repair_services['theme_setting'];
		} else {
			$theme = '';
		}

		if ( $theme != '2' ) {

			$labels = array(
				'name'                  => _x( 'Coupons', 'Post Type General Name', 'car-repair-services-core' ),
				'singular_name'         => _x( 'Coupon', 'Post Type Singular Name', 'car-repair-services-core' ),
				'menu_name'             => __( 'Coupons', 'car-repair-services-core' ),
				'name_admin_bar'        => __( 'Coupon', 'car-repair-services-core' ),
				'archives'              => __( 'Item Archives', 'car-repair-services-core' ),
				'parent_item_colon'     => __( 'Parent Item:', 'car-repair-services-core' ),
				'all_items'             => __( 'All Coupons', 'car-repair-services-core' ),
				'add_new_item'          => __( 'Add New Coupon', 'car-repair-services-core' ),
				'add_new'               => __( 'Add New Coupon', 'car-repair-services-core' ),
				'new_item'              => __( 'New Service Item', 'car-repair-services-core' ),
				'edit_item'             => __( 'Edit Coupon Item', 'car-repair-services-core' ),
				'update_item'           => __( 'Update Coupon Item', 'car-repair-services-core' ),
				'view_item'             => __( 'View Coupon Item', 'car-repair-services-core' ),
				'search_items'          => __( 'Search Item', 'car-repair-services-core' ),
				'not_found'             => __( 'Not found', 'car-repair-services-core' ),
				'not_found_in_trash'    => __( 'Not found in Trash', 'car-repair-services-core' ),
				'featured_image'        => __( 'Featured Image', 'car-repair-services-core' ),
				'set_featured_image'    => __( 'Set featured image', 'car-repair-services-core' ),
				'remove_featured_image' => __( 'Remove featured image', 'car-repair-services-core' ),
				'use_featured_image'    => __( 'Use as featured image', 'car-repair-services-core' ),
				'insert_into_item'      => __( 'Insert into item', 'car-repair-services-core' ),
				'uploaded_to_this_item' => __( 'Uploaded to this item', 'car-repair-services-core' ),
				'items_list'            => __( 'Items list', 'car-repair-services-core' ),
				'items_list_navigation' => __( 'Items list navigation', 'car-repair-services-core' ),
				'filter_items_list'     => __( 'Filter items list', 'car-repair-services-core' ),
			);

			$args = array(
				'labels'             => $labels,
				'description'        => __( 'Description.', 'car-repair-services-core' ),
				'public'             => true,
				'publicly_queryable' => true,
				'show_ui'            => true,
				'show_in_menu'       => true,
				'query_var'          => true,
				'rewrite'            => array( 'slug' => 'our-coupons' ),
				'capability_type'    => 'post',
				'has_archive'        => true,
				'hierarchical'       => false,
				'menu_position'      => null,
				'supports'           => array( 'title', 'thumbnail' ),
			);

			register_post_type( 'our-coupons', $args );
		}
	}
}
add_action( 'init', 'car_repair_services_coupons_post_type', 0 );
