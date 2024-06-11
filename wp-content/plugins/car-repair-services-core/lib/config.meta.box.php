<?php
add_filter( 'rwmb_meta_boxes', 'car_repair_services_register_framework_post_meta_box' );

/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @return void
 */
function car_repair_services_register_framework_post_meta_box( $meta_boxes ) {
	global $wp_registered_sidebars;

	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix = 'framework';

	$sidebars = array();

	foreach ( $wp_registered_sidebars as $key => $value ) {
		$sidebars[ $key ] = $value['name'];
	}

	$opacities = array();

	for ( $o = 0.0, $n = 0; $o <= 1.0; $o += 0.1, $n++ ) {
		$opacities[ $n ] = $o;
	}

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-quote',
		'title'     => esc_html__( 'Post Format Data', 'car-repair-services-core' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Quote Author', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Insert quote author name.', 'car-repair-services-core' ),
				'id'   => "{$prefix}-quote-author",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Quote Author Url', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Insert author url.', 'car-repair-services-core' ),
				'id'   => "{$prefix}-quote-author-link",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Quote Text', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Insert Quote Text.', 'car-repair-services-core' ),
				'id'   => "{$prefix}-quote",
				'type' => 'textarea',
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-video',
		'title'     => esc_html__( 'Post Format Data', 'car-repair-services-core' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Video Markup', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Put embed src of video. i.e. youtube, vimeo', 'car-repair-services-core' ),
				'id'   => "{$prefix}-video-markup",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-audio',
		'title'     => esc_html__( 'Post Format Data', 'car-repair-services-core' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Audio Markup', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Put embed src of video. i.e. youtube, vimeo', 'car-repair-services-core' ),
				'id'   => "{$prefix}-audio-markup",
				'type' => 'textarea',
				'cols' => 20,
				'rows' => 3,
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-link',
		'title'     => esc_html__( 'Post Format Data', 'car-repair-services-core' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Link', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Works with link post format.', 'car-repair-services-core' ),
				'id'   => "{$prefix}-link",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Link title', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Works with link post format.', 'car-repair-services-core' ),
				'id'   => "{$prefix}-link-title",
				'type' => 'text',
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-post-format-gallery',
		'title'     => esc_html__( 'Post Format Data', 'car-repair-services-core' ),
		'pages'     => array(
			'post',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name'             => esc_html__( 'Upload Gallery Images', 'car-repair-services-core' ),
				'id'               => "{$prefix}-gallery",
				'desc'             => '',
				'type'             => 'image_advanced',
				'max_file_uploads' => 24,
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-gallery',
		'title'     => esc_html__( 'Manage Gallery Meta Fields', 'car-repair-services-core' ),
		'pages'     => array(
			'gallery',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name'             => esc_html__( 'Upload Gallery Image', 'car-repair-services-core' ),
				'id'               => "{$prefix}-gallery",
				'desc'             => '',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'name'             => esc_html__( 'Compare Before Gallery Image', 'car-repair-services-core' ),
				'id'               => "{$prefix}-compare-before-gallery",
				'desc'             => '',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'name'             => esc_html__( 'Compare After Gallery Image', 'car-repair-services-core' ),
				'id'               => "{$prefix}-compare-after-gallery",
				'desc'             => '',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
		),
	);

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-testimonials',
		'title'     => esc_html__( 'Manage Testimonial Meta Fields', 'car-repair-services-core' ),
		'pages'     => array(
			'car-testimonial',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Customer Name', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Customer Name.', 'car-repair-services-core' ),
				'id'   => "{$prefix}-client-name",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Customer Designation', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Customer Designation.', 'car-repair-services-core' ),
				'id'   => "{$prefix}-client-designation",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'User Location', 'car-repair-services-core' ),
				'desc' => esc_html__( 'User Location', 'car-repair-services-core' ),
				'id'   => "{$prefix}-user-location",
				'type' => 'text',
			),
			array(
				'name'    => esc_html__( 'Customer Ratting', 'car-repair-services-core' ),
				'desc'    => esc_html__( 'Enter Customer Ratting', 'car-repair-services-core' ),
				'id'      => "{$prefix}-client-ratting",
				'type'    => 'select',
				'options' => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4',
					'5' => '5',
				),
			),
			array(
				'id'          => "{$prefix}-ratting_style",
				'name'        => esc_html__( 'Rating Style', 'car-repair-services-core' ),
				'desc'        => '',
				'type'        => 'image_select',
				'std'         => '',
				'options'     => array(
					'1' => CAR_REPAIR_SERVICES_THEME_URI . '/images/admin/light.png',
					'2' => CAR_REPAIR_SERVICES_THEME_URI . '/images/admin/dark.png',
				),
				'placeholder' => esc_html__( 'Select', 'car-repair-services-core' ),
			),
			array(
				'name'             => esc_html__( 'Testimonials Image', 'car-repair-services-core' ),
				'desc'             => 'This is the testimonials design two image that is shown in the testimonials two shortcode.',
				'id'               => $prefix . '-testimonials-image',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
		// car-testimonial
		),
	);
	$icon_font_url = get_bloginfo( 'template_url' ) . '/iconfont/demo.html';
	$meta_boxes[]  = array(
		'id'        => 'framework-meta-box-car-repair-services',
		'title'     => esc_html__( 'Manage Car Services Meta Fields', 'car-repair-services-core' ),
		'pages'     => array(
			'car_services',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Icon', 'car-repair-services-core' ),
				'desc' => __( 'Service Icon. Click Here for <a href="' . $icon_font_url . '?width=1000&height=600&TB_iframe=true" class="thickbox" title="Car Repair Icon List">Car Repair Icon List!</a>', 'car-repair-services-core' ),
				'id'   => "{$prefix}-service-icon",
				'type' => 'text',
			),
			array(
				'name'             => esc_html__( 'Service Single Image', 'car-repair-services-core' ),
				'id'               => "{$prefix}-service-single-image",
				'desc'             => 'If you want to use your custom image in place of an icon, then upload your own image',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'name'             => esc_html__( 'Custom Icon Image', 'car-repair-services-core' ),
				'id'               => "{$prefix}-service-icon-image",
				'desc'             => 'If you want to use your custom image in place of an icon, then upload your own image',
				'type'             => 'image_advanced',
				'max_file_uploads' => 1,
			),
			array(
				'name' => esc_html__( 'Custom Icon Link', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Add css Link for custom Icon', 'car-repair-services-core' ),
				'id'   => "{$prefix}-service-page-icon-link",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Page Heading', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Heading of Page.', 'car-repair-services-core' ),
				'id'   => "{$prefix}-service-page-head",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Sub Title', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Sub Heading of Page.', 'car-repair-services-core' ),
				'id'   => "{$prefix}-service-page-sub-head",
				'type' => 'textarea',
			),
		),
	);
	// coupons
	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-car-repair-our-coupons',
		'title'     => esc_html__( 'Our Coupons Meta Fields', 'car-repair-services-core' ),
		'pages'     => array(
			'our-coupons',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Coupon Top Left', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Coupon Top Left', 'car-repair-services-core' ),
				'id'   => "{$prefix}-coupon-top-left",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Coupon Top Right', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Coupon Top Right', 'car-repair-services-core' ),
				'id'   => "{$prefix}-coupon-top-right",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Coupon Bottom Left', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Coupon Bottom Left', 'car-repair-services-core' ),
				'id'   => "{$prefix}-coupon-bottom-left",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Coupon Bottom Right', 'car-repair-services-core' ),
				'desc' => esc_html__( 'Coupon Bottom Right', 'car-repair-services-core' ),
				'id'   => "{$prefix}-coupon-bottom-right",
				'type' => 'text',
			),
		),
	);

	$posts_page = get_option( 'page_for_posts' );

	$meta_boxes[] = array(
		'id'        => 'framework-meta-box-thumbsize',
		'title'     => esc_html__( 'Select Thumbnail size for gallery', 'car-repair-services-core' ),
		'pages'     => array(
			'projects',
		),
		'context'   => 'normal',
		'priority'  => 'high',
		'tab_style' => 'left',
		'fields'    => array(
			array(
				'name' => esc_html__( 'Amount', 'car-repair-services-core' ),
				'id'   => "{$prefix}-amount",
				'type' => 'text',
			),
			array(
				'name' => esc_html__( 'Time duration ( Day or weeks or month )', 'car-repair-services-core' ),
				'id'   => "{$prefix}-timeduration",
				'type' => 'text',
			),
			array(
				'name'    => esc_html__( 'Select Thumbanail size', 'car-repair-services-core' ),
				'id'      => "{$prefix}-thumbnail-size",
				'type'    => 'select',
				'options' => array(
					''           => 'Default',
					'sm_squier'  => 'Small Squier',
					'big_squier' => 'Big Squier',
					'single_hor' => 'Single Horizontal',
					'single_var' => 'Single Vertical',
				),
			),
		),
	);

	$posts_page = get_option( 'page_for_posts' );

	if ( ! isset( $_GET['post'] ) || intval( $_GET['post'] ) != $posts_page ) {

		$meta_boxes[] = array(
			'id'       => $prefix . '_page_meta_box',
			'title'    => esc_html__( 'Page Design Settings', 'car-repair-services-core' ),
			'pages'    => array(
				'page',
			),
			'context'  => 'normal',
			'priority' => 'core',
			'fields'   => array(
				array(
					'id'      => "{$prefix}_page_title_style",
					'name'    => esc_html__( 'Page Title Style', 'car-repair-services-core' ),
					'desc'    => '',
					'type'    => 'radio',
					'std'     => 'off',
					'options' => array(
						'on'  => 'Yes',
						'off' => 'No',
					),
				),
				array(
					'id'      => "{$prefix}_show_breadcrumb",
					'name'    => esc_html__( 'Show Breadcrumb', 'car-repair-services-core' ),
					'desc'    => '',
					'type'    => 'radio',
					'std'     => 'on',
					'options' => array(
						'on'  => 'Yes',
						'off' => 'No',
					),
				),
			),
		);
	}

	return $meta_boxes;
}
