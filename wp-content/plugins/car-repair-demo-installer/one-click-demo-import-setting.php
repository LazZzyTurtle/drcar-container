<?php
// add_filter(
// 	'pt-ocdi/replace_url',
// 	function () {
// 		return array( 'https://smartdata.tonytemplates.com/car-repair-service-v4/' );
// 	}
// );

// add_filter(
// 	'pt-ocdi/domain_name',
// 	function () {
// 		return array( 'smartdata.tonytemplates.com' );
// 	}
// );


// add_filter(
// 	'pt-ocdi/destination_path',
// 	function () {
// 		return '/wp-content/plugins/car-repair-demo-installer/images/';
// 	}
// );

add_filter(
	'pt-ocdi/import_files',
	function() {
		return array(
			array(
				'import_file_name'             => esc_html__( 'Demo 01 ', 'chaoz' ),
				'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demo-data/demo1/contents.xml',
				'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demo-data/demo1/widgets.wie',
				'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'demo-data/demo1/screen-image.png',
				'local_import_customizer_file' => plugin_dir_path( __FILE__ ) . 'demo-data/demo1/customize.dat',
				'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Yes! Important" button.', 'chaoz' ),
				'preview_url'                  => 'https://smartdata.tonytemplates.com/car-repair-service-v4/car1/',
				'local_import_redux'           => array(
					array(
						'file_path'   => plugin_dir_path( __FILE__ ) . 'demo-data/demo1/settings.json',
						'option_name' => 'car_repair_services_opt',
					),
				),
			),
			array(
				'import_file_name'             => esc_html__( 'Demo 02 ', 'chaoz' ),
				'local_import_file'            => plugin_dir_path( __FILE__ ) . 'demo-data/demo2/contents.xml',
				'local_import_widget_file'     => plugin_dir_path( __FILE__ ) . 'demo-data/demo2/widgets.wie',
				'import_preview_image_url'     => plugin_dir_url( __FILE__ ) . 'demo-data/demo2/screen-image.png',
				'local_import_customizer_file' => plugin_dir_path( __FILE__ ) . 'demo-data/demo2/customize.dat',
				'import_notice'                => esc_html__( 'Install and active all required plugins before you click on the "Yes! Important" button.', 'chaoz' ),
				'preview_url'                  => 'https://smartdata.tonytemplates.com/car-repair-service-v4/car2',
				'local_import_redux'           => array(
					array(
						'file_path'   => plugin_dir_path( __FILE__ ) . 'demo-data/demo2/settings.json',
						'option_name' => 'car_repair_services_opt',
					),
				),
			),
		);
	},
	15
);



add_action(
	'pt-ocdi/after_import',
	function() {
		$top_menu    = get_term_by( 'name', 'Primary Menu', 'nav_menu' );
		$footer_menu = get_term_by( 'name', 'Footer Menu', 'nav_menu' );
		if ( isset( $top_menu->term_id ) ) {
			set_theme_mod(
				'nav_menu_locations',
				array(
					'theme_location' => 'primary',
					'primary'        => $top_menu->term_id,
					'footer-menu'    => $footer_menu->term_id,
				)
			);
		}
		// $home_page = get_page_by_title( 'Home' );

		$get_home_query = new WP_Query(
			array(
				'post_type'              => 'page', 
				'title'                  => 'Home Page',
				'post_status'            => 'all',
				'posts_per_page'         => 1,
				'no_found_rows'          => true,
				'ignore_sticky_posts'    => true,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
				'orderby'                => 'post_date ID',
				'order'                  => 'ASC',
			)
		);
		 
		if ( ! empty( $get_home_query->post ) ) {
			$home_page = $get_home_query->post;
		}
		update_option( 'page_on_front', $home_page->ID );
		update_option( 'show_on_front', 'page' );

		// $blog_page = get_page_by_title( 'Blog Posts' );
		
		$get_blog_query = new WP_Query(
			array(
				'post_type'              => 'page',
				'title'                  => 'Blog Posts',
				'post_status'            => 'all',
				'posts_per_page'         => 1,
				'no_found_rows'          => true,
				'ignore_sticky_posts'    => true,
				'update_post_term_cache' => false,
				'update_post_meta_cache' => false,
				'orderby'                => 'post_date ID',
				'order'                  => 'ASC',
			)
		);
		 
		if ( ! empty( $get_blog_query->post ) ) {
			$blog_page = $get_blog_query->post;
		}
		update_option( 'page_for_posts', $blog_page->ID );
	}
);

$token = get_option( 'envato_theme_license_token' );
if ( $token != '' ) {
	add_filter(
		'pt-ocdi/plugin_page_setup',
		function () {
			return array(
				'parent_slug' => 'envato-theme-license-dashboard',
				'page_title'  => esc_html__( 'One Click Demo Import', 'pt-ocdi' ),
				'menu_title'  => esc_html__( 'Import Demo Data', 'pt-ocdi' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'envato-theme-license-one-click-demo-import',
			);
		}
	);
} else {
	add_filter(
		'pt-ocdi/plugin_page_setup',
		function () {
			return array(
				'parent_slug' => 'themes.php',
				'page_title'  => esc_html__( 'One Click Demo Import', 'pt-ocdi' ),
				'menu_title'  => esc_html__( 'Import Demo Data', 'pt-ocdi' ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'one-click-demo-import',
			);
		}
	);
}
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );
