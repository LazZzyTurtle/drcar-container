<?php

class ServiceEstimateFields {


	public function __construct() {
		 add_filter( 'rwmb_meta_boxes', array( $this, 'register_meta_boxes' ) );
		add_action( 'rwmb_enqueue_scripts', array( $this, 'enqueue' ) );
		add_filter( 'rwmb_meta_boxes', array( $this, 'carleader_register_taxonomy_meta_boxes' ) );

	}

	public function register_meta_boxes( $meta_boxes ) {
		$files = glob( __DIR__ . '/fields/*.php' );
		foreach ( $files as $file ) {
			$meta_boxes[] = include $file;
		}

		return $meta_boxes;
	}


	public function carleader_register_taxonomy_meta_boxes( $meta_boxes ) {
		$meta_boxes[] = array(
			'title'         => 'Car Models',
			'taxonomies'    => array(
				'model-car',
			),
			'fields'        => array(
				array(
					'name'       => 'Model Car',
					'id'         => 'car_model_make',
					'type'       => 'taxonomy',
					'taxonomy'   => 'make-brand',
					'field_type' => 'select_advanced',
				),
				array(
					'name'            => 'Model Year',
					'id'              => 'car_year_make',
					'type'            => 'taxonomy',
					'taxonomy'        => 'model-year',
					'field_type'      => 'select_advanced',
					'select_all_none' => true,
					'placeholder'     => 'Select Year',
					'multiple'        => true,
					'query_args'      => array(
						'number' => '', // THIS
					),
				),
				array(
					'name'            => 'Select Services',
					'id'              => 'car_service',
					'type'            => 'post',
					'post_type'       => 'service-estimate',
					'field_type'      => 'select_advanced',
					'select_all_none' => true,
					'placeholder'     => 'Select Services',
					'multiple'        => true,
					'query_args'      => array(
						'post_status'    => 'publish',
						'posts_per_page' => - 1,
					),
				),
			),

			'admin_columns' => 'before title',
		);
		$meta_boxes[] = array(
			'title'         => 'Parts',
			'taxonomies'    => array(
				'service-part',
			),
			'fields'        => array(
				array(
					'name'            => 'Car Model',
					'id'              => 'car_model',
					'type'            => 'taxonomy',
					'taxonomy'        => 'model-car',
					'field_type'      => 'select_advanced',
					'select_all_none' => true,
					'multiple'        => true,
				),
				array(
					'name'            => 'Model Year',
					'id'              => 'car_year',
					'type'            => 'taxonomy',
					'taxonomy'        => 'model-year',
					'field_type'      => 'select_advanced',					
					'select_all_none' => true,
					'placeholder'     => 'Select Years',
					'multiple'        => true,
				),
				array(
					'name' => 'Minimum price',
					'id'   => 'min_price',
					'type' => 'number',
				),
				array(
					'name' => 'Maximum Price',
					'id'   => 'max_price',
					'type' => 'number',
				),
			),
			'admin_columns' => 'before title',
		);
		return $meta_boxes;
	}


	public function enqueue( $meta_box ) {
		if ( ! $this->is_screen() || '_carleader_listing_select' != $meta_box->id ) {
			return;
		}

		// $css_dir = CARLEADER_LISTING_URL . 'assets/admin/css/';
		// $js_dir  = CARLEADER_LISTINGS_URL . 'assets/admin/js/';
	}
	public function is_screen() {
		if ( ! is_admin() ) {
			return true;
		}
		return 'service-estimate' === get_current_screen()->post_type;
	}

}

new ServiceEstimateFields();
