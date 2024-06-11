<?php

class ServiceEstimate {


	public function __construct() {
		 add_action( 'init', [ $this, 'register_post_type' ] );
		add_action( 'init', [ $this, 'register_taxonomy' ] );
		add_action( 'add_meta_boxes', [ $this, 'remove_service_part_meta_box' ] );
		add_action( 'add_meta_boxes', [ $this, 'remove_make_brand_meta_box' ] );
		add_action( 'add_meta_boxes', [ $this, 'remove_model_car_meta_box' ] );
	}

	public function register_post_type() {
		$slug = 'service-estimate';

		$labels = [
			'name'                  => _x( 'Service Estimates', 'Listing post type name', 'estimate-plugin' ),
			'singular_name'         => _x( 'Service Estimate', 'Singular carleader listing post type name', 'estimate-plugin' ),
			'add_new'               => __( 'New Service Estimate', 'estimate-plugin' ),
			'add_new_item'          => __( 'Add New Service Estimate', 'estimate-plugin' ),
			'edit_item'             => __( 'Edit Service Estimate', 'estimate-plugin' ),
			'new_item'              => __( 'New Service Estimate', 'estimate-plugin' ),
			'all_items'             => __( 'Service Estimates', 'estimate-plugin' ),
			'view_item'             => __( 'View Service Estimate', 'estimate-plugin' ),
			'search_items'          => __( 'Search Service Estimates', 'estimate-plugin' ),
			'not_found'             => __( 'No Service Estimates found', 'estimate-plugin' ),
			'not_found_in_trash'    => __( 'No Service Estimates found in Trash', 'estimate-plugin' ),
			'parent_item_colon'     => '',
			'menu_name'             => _x( 'Service Estimates', 'listing post type menu name', 'estimate-plugin' ),
			'filter_items_list'     => __( 'Service Estimates Filter list', 'estimate-plugin' ),
			'items_list_navigation' => __( 'Service Estimates list navigation', 'estimate-plugin' ),
			'items_list'            => __( 'Service Estimates list', 'estimate-plugin' ),
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'menu_icon'          => 'dashicons-dashboard',
			'menu_position'      => 56,
			'query_var'          => true,
			'rewrite'            => [
				'slug'       => untrailingslashit( $slug ),
				'with_front' => false,
				'feeds'      => true,
			],
			// 'capability_type'    => 'listing',
			'map_meta_cap'       => true,
			// 'has_archive'        => ( $archive_page = carleader_listings_option( 'archives_page' ) ) && get_post( $archive_page ) ? get_page_uri( $archive_page ) : 'listings',
			// 'has_archive'        => 'listings',
			'hierarchical'       => false,
			'supports'           => [ 'title', 'editor', 'thumbnail' ],
		];

		register_post_type( 'service-estimate', $args );

	}

	public function register_taxonomy() {
		$taxonomies = array(
			array(
				'slug'         => 'service-cat',
				'single_name'  => 'Category Service',
				'plural_name'  => 'Category Services',
				'post_type'    => 'service-estimate',
				'hierarchical' => false,

			),
			array(
				'slug'         => 'make-brand',
				'single_name'  => 'Make',
				'plural_name'  => 'Makes',
				'post_type'    => 'service-estimate',
				'hierarchical' => false,

			),
			array(
				'slug'         => 'model-car',
				'single_name'  => 'Model',
				'plural_name'  => 'Models',
				'post_type'    => 'service-estimate',
				'hierarchical' => false,
			),
			array(
				'slug'        => 'model-year',
				'single_name' => 'Year',
				'plural_name' => 'Years',
				'post_type'   => 'service-estimate',
			),
			array(
				'slug'        => 'service-part',
				'single_name' => 'Part',
				'plural_name' => 'Parts',
				'post_type'   => 'service-estimate',
			),
		);

		foreach ( $taxonomies as $taxonomy ) {
			$labels = array(
				'name'          => $taxonomy['plural_name'],
				'singular_name' => $taxonomy['single_name'],
				'search_items'  => 'Search ' . $taxonomy['plural_name'],
				'all_items'     => 'All ' . $taxonomy['plural_name'],
				'edit_item'     => 'Edit ' . $taxonomy['single_name'],
				'add_new_item'  => 'Add New ' . $taxonomy['single_name'],
				'menu_name'     => $taxonomy['plural_name'],
			);

			$rewrite      = isset( $taxonomy['rewrite'] ) ? $taxonomy['rewrite'] : array( 'slug' => $taxonomy['slug'] );
			$hierarchical = isset( $taxonomy['hierarchical'] ) ? $taxonomy['hierarchical'] : true;

			register_taxonomy(
				$taxonomy['slug'],
				$taxonomy['post_type'],
				array(
					'labels'    => $labels,
					'show_ui'   => true,
					'query_var' => true,
					'rewrite'   => $rewrite,

				)
			);
		}
	}

	public function remove_service_part_meta_box() {
		remove_meta_box( 'tagsdiv-service-part', 'service-estimate', 'side' );
	}
	public function remove_make_brand_meta_box() {
		remove_meta_box( 'tagsdiv-make-brand', 'service-estimate', 'side' );
	}
	public function remove_model_car_meta_box() {
		remove_meta_box( 'tagsdiv-model-car', 'service-estimate', 'side' );
	}



}

new ServiceEstimate();


