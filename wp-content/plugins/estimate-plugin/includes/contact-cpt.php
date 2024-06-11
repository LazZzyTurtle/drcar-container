<?php 

class ContactPost {
	public function __construct() {
		add_action( 'init', [ $this, 'register_post_type' ] );
	}
	public function register_post_type() {
		$labels = [
			'name'                  => _x( 'Service Contacts', 'Enquiry post type name', 'estimate-plugin' ),
			'singular_name'         => _x( 'Service Contact', 'Singular enquiry post type name', 'estimate-plugin' ),
			'add_new'               => __( 'New Service Contact', 'estimate-plugin' ),
			'add_new_item'          => __( 'Add New Service Contact', 'estimate-plugin' ),
			'edit_item'             => __( 'Edit Service Contact', 'estimate-plugin' ),
			'new_item'              => __( 'New Service Contact', 'estimate-plugin' ),
			'all_items'             => __( 'Service Contacts', 'estimate-plugin' ),
			'view_item'             => __( 'View Service Contact', 'estimate-plugin' ),
			'search_items'          => __( 'Search Service Contacts', 'estimate-plugin' ),
			'not_found'             => __( 'No Service Contacts found', 'estimate-plugin' ),
			'not_found_in_trash'    => __( 'No Service Contacts found in Trash', 'estimate-plugin' ),
			'menu_name'             => _x( 'Service Contacts', 'enquiry post type menu name', 'estimate-plugin' ),
			'filter_items_list'     => __( 'Filter Service Contacts ', 'estimate-plugin' ),
			'items_list_navigation' => __( 'Service Contact navigation', 'estimate-plugin' ),
			'items_list'            => __( 'Service Contacts', 'estimate-plugin' ),
		];

		$args = [
			'labels'              => $labels,
			'public'              => false,
			'publicly_queryable'  => false,
			'exclude_from_search' => true,
			'show_in_nav_menus'   => false,
			'show_ui'             => true,
			'show_in_menu'        => 'edit.php?post_type=service-estimate',
			'show_in_admin_bar'   => false,
			'menu_icon'           => 'dashicons-email',
			'menu_position'       => 56,
			'query_var'           => true,
			//'rewrite'            => array('slug' => 'listings-enquiry', 'with_front' => false),
			'capability_type'     => 'post',
			'capabilities'        => [
				'create_posts' 	  => 'do_not_allow',
				// Removes support for the "Add New" function ( use 'do_not_allow' instead of false for multisite set ups )
			],
			'map_meta_cap'        => true, // Set to `false`, if users are not allowed to edit/delete existing posts
			//'has_archive'        => '',
			'hierarchical'        => false,
			'supports'            => [ 'title', 'revisions' ],
		];
		register_post_type( 'service-contact', $args );
	}
}
new ContactPost();