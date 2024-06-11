<?php
// Register Custom Post Type
function car_repair_services_services_post_type() {

	$labels = array(
		'name'                  => _x( 'Services', 'Post Type General Name', 'car-repair-services-core' ),
		'singular_name'         => _x( 'Service', 'Post Type Singular Name', 'car-repair-services-core' ),
		'menu_name'             => __( 'Services', 'car-repair-services-core' ),
		'name_admin_bar'        => __( 'Service', 'car-repair-services-core' ),
		'archives'              => __( 'Item Archives', 'car-repair-services-core' ),
		'parent_item_colon'     => __( 'Parent Item:', 'car-repair-services-core' ),
		'all_items'             => __( 'All Services', 'car-repair-services-core' ),
		'add_new_item'          => __( 'Add New Service', 'car-repair-services-core' ),
		'add_new'               => __( 'Add New Service', 'car-repair-services-core' ),
		'new_item'              => __( 'New Service Item', 'car-repair-services-core' ),
		'edit_item'             => __( 'Edit Service Item', 'car-repair-services-core' ),
		'update_item'           => __( 'Update Service Item', 'car-repair-services-core' ),
		'view_item'             => __( 'View Service Item', 'car-repair-services-core' ),
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

	$slug_postype_car_service = 'car-services';
	if ( function_exists( 'car_repair_services_options' ) ) {
		$car_repair_services_option = car_repair_services_options();
		if ( isset( $car_repair_services_option['car_repair_services-slug_postype_car_repair_services'] ) && ! empty( $car_repair_services_option['car_repair_services-slug_postype_car_repair_services'] ) ) {
				$slug_postype_car_service = $car_repair_services_option['car_repair_services-slug_postype_car_repair_services'];
		}
	}

	$args = array(
		'labels'             => $labels,
		'description'        => __( 'Description.', 'car-repair-services-core' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => $slug_postype_car_service ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
	);

	register_post_type( 'car_services', $args );

}
add_action( 'init', 'car_repair_services_services_post_type', 0 );
