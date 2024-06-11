<?php
class SearchForm {



	private $makedata;

	public function __construct() {
		add_filter( 'wp', array( $this, 'has_shortcode' ) );
		add_shortcode( 'estimate_search_form', array( $this, 'estimate_search_form' ) );
		add_shortcode( 'estimate_search', array( $this, 'search_form' ) );
		add_action( 'wp_ajax_select_drop_model', array( $this, 'select_drop_model' ) );
		add_action( 'wp_ajax_nopriv_select_drop_model', array( $this, 'select_drop_model' ) );
		add_action( 'wp_ajax_select_drop_year', array( $this, 'select_drop_year' ) );
		add_action( 'wp_ajax_nopriv_select_drop_year', array( $this, 'select_drop_year' ) );
		add_action( 'wp_ajax_select_services', array( $this, 'select_services' ) );
		add_action( 'wp_ajax_nopriv_select_services', array( $this, 'select_services' ) );
	}
	public function has_shortcode() {
		global $post;
	}

	function select_drop_model() {
		if ( ! empty( $_POST['makedta'] ) ) {
			$makedata = $_POST['makedta'];
		}

		$terms = get_terms(
			array(
				'taxonomy'   => 'model-car',
				'hide_empty' => false,
			)
		);
		foreach ( $terms as $term ) {
			$vmake = rwmb_meta( 'car_model_make', array( 'object_type' => 'term' ), $term->term_id );
			if ( $vmake->term_id == $makedata ) {
				$model[ $term->term_id ] = $term->name;
			}
		}
		$args = array(
			'name'  => 'model',
			'label' => __( 'Model', 'carleader-listings' ),
		);
		echo $this->select_field( $model, $args );
		exit();
	}

	function select_drop_year() {
		if ( ! empty( $_POST['modeldta'] ) ) {
			$modeldata = $_POST['modeldta'];
		}

		$terms = get_terms(
			array(
				'taxonomy'   => 'model-car',
				'hide_empty' => false,
			)
		);
		foreach ( $terms as $term ) {
			$vmodel = $term->term_id;
			if ( $vmodel == $modeldata ) {
				$vyear = rwmb_meta( 'car_year_make', array( 'object_type' => 'term' ), $term->term_id );
			};
		}
		$options = array();
		foreach ( $vyear as $year ) {
			$options[ $year->term_id ] = $year->slug;
		}
		$options = array_unique( $options );
		asort( $options );
		$args = array(
			'name'  => 'the_year',
			'label' => __( 'Year', 'carleader-listings' ),
		);

		echo $this->select_field( $options, $args );
		exit();
	}

	function select_services() {

		$termsmodel = get_terms(
			array(
				'taxonomy'   => 'model-car',
				'number'     => 9,
				'include'    => $_POST['servdta'],
				'hide_empty' => false,
			)
		);

		$args      = array(
			'name'  => 'serviceestimate',
			'label' => __( 'Service', 'carleader-listings' ),
		);
		$data      = rwmb_meta( 'car_service', array( 'object_type' => 'term' ), $termsmodel[0]->term_id );
		$yearArray = array();
		$countdiv  = 0;
		foreach ( $data as $key => $value ) {
			$service     = get_post( $value );
			$servicearr  = array();
			$metayears   = service_estimate_meta( 'years_service', $service->ID );
			$serviceCat  = service_estimate_meta( 'category', $service->ID );
			$termcatgery = get_terms(
				array(
					'taxonomy'   => 'service-cat',
					'number'     => 9,
					'include'    => $serviceCat,
					'hide_empty' => false,
				)
			);
			if ( ! isset( $termcatgery[0] ) ) {
					  $serviceCatName = esc_html__( 'general', 'estimate-plugin' );
			} else {
				$serviceCatName = $termcatgery[0]->name;
			}
			if ( empty( $selectField[ $serviceCatName ] ) ) {
				if ( ( $countdiv % 2 ) == 0 ) {
					$selectField[ $serviceCatName ]  = '<div class="col-sm-6">';
					$selectField[ $serviceCatName ] .= '<h5>' . $serviceCatName . '</h5>';
				} else {
					$selectField[ $serviceCatName ] = '<h5>' . $serviceCatName . '</h5>';
				}
					  $countdiv++;
			}
			if ( ! empty( $metayears ) ) {
				$yearArray = explode( ',', $metayears );
				if ( in_array( $_POST['yeardta'], $yearArray ) ) {
					$servicearr[ $service->ID ] = $service->post_title;
					asort( $servicearr );
				}
			} else {
				$servicearr[ $service->ID ] = $service->post_title;
			}
			$selectField[ $serviceCatName ] .= $this->multiple_select_field( $servicearr, $args );
		}

		echo json_encode( $selectField );
		exit();
	}

	public function search_form( $atts ) {
		$s       = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : '';
		$atts    = shortcode_atts(
			array(
				'area_placeholder' => __( 'State, Zip, Town', 'carleader-listings' ),
				'submit_btn'       => __( 'Find My Car', 'carleader-listings' ),
				'refine_text'      => __( 'More Refinements', 'carleader-listings' ),
				'style'            => '1',
				'layout'           => '',
				'exclude'          => array(),
			),
			$atts
		);
		$exclude = ! empty( $atts['exclude'] ) ? array_map( 'trim', explode( ',', $atts['exclude'] ) ) : array();
		ob_start();
		?>


<div class="estimator-panel">
  <div class="form">
	<div class="container">
	  <div class="col-title"><i class="icon-calcilate"></i><?php esc_html_e( 'Car Repair Estimator', 'estimate-plugin' ); ?>
		<div class="panel-toggle js-estimator-panel-toggle"><span><?php esc_html_e( 'CLICK', 'estimate-plugin' ); ?><i class="icon-pointer"></i></span><span><i class="icon-close-cross"></i></span></div>
		</div>
		<div class="col-form">
		  <div class="estimator-form-label"><?php esc_html_e( 'Get a location-based car repair estimate', 'estimate-plugin' ); ?></div>
		  <form
			class="estimate_search  s-<?php echo esc_attr( $atts['style'] ); ?> <?php echo esc_attr( $atts['layout'] ); ?>" autocomplete="off"
			action="<?php echo home_url( 'estimateresult/result' ); ?>"
			method="GET"
			role="search">
			  <div class="estimator-form-row">
				<div class="select-wrapper-sm w-auto">
		<?php if ( ! in_array( 'make', $exclude ) ) : ?>
			<?php echo $this->make_field( $atts ); ?>
				</div>
				<div class="select-wrapper-sm w-auto">
			<?php
			if ( ! in_array( 'model', $exclude ) ) {
				echo $this->model_field( $atts );
			}
			?>
				</div>
				<div class="select-wrapper-sm w-auto">
			<?php
			if ( ! in_array( 'year', $exclude ) ) {
				echo $this->year_field( $atts );
			}
			?>
				</div>
		<?php endif; ?>
			  <input placeholder="State, Zip, Town" type="hidden" name="s">
			  <div class="input-with-link">
				<input type="text" name="serviceestimatekey" class="form-control input-custom input-search" disabled="disabled" placeholder="Repair Needed"  id="estimatorInput1">
				<a href="#" data-toggle="modal" data-target="#fullServices"><?php esc_html_e( 'FULL LIST', 'estimate-plugin' ); ?></a>
			  </div>
			  <button class="btn btn-border" type="submit"><span><?php esc_html_e( 'GET ESTIMATE', 'estimate-plugin' ); ?></span></button>
			  </div>
			</form>
		</div>
	  </div>
	</div>
</div>

		<?php
		$output = ob_get_clean();
		return apply_filters( 'carleader_listings_search_form_output', $output, $atts );
	}

	public function estimate_search_form( $atts ) {
		$s       = isset( $_GET['s'] ) ? sanitize_text_field( $_GET['s'] ) : '';
		$atts    = shortcode_atts(
			array(
				'area_placeholder' => __( 'State, Zip, Town', 'carleader-listings' ),
				'submit_btn'       => __( 'Find My Car', 'carleader-listings' ),
				'refine_text'      => __( 'More Refinements', 'carleader-listings' ),
				'style'            => '1',
				'layout'           => '',
				'exclude'          => array(),
			),
			$atts
		);
		$exclude = ! empty( $atts['exclude'] ) ? array_map( 'trim', explode( ',', $atts['exclude'] ) ) : array();
		ob_start();
		?>

		  
		  <form
			class="estimate_search form-table  s-<?php echo esc_attr( $atts['style'] ); ?> <?php echo esc_attr( $atts['layout'] ); ?>" autocomplete="off"
			action="<?php echo home_url( 'estimateresult/result' ); ?>"
			method="GET"
			role="search">
			 <div class="form-group form-group-cell">
								<div class="select-wrapper">
		<?php if ( ! in_array( 'make', $exclude ) ) : ?>
			<?php echo $this->make_field( $atts ); ?>
				</div>
			  </div>
							<div class="form-group form-group-cell">
								<div class="select-wrapper">
			<?php
			if ( ! in_array( 'model', $exclude ) ) {
				echo $this->model_field( $atts );
			}
			?>
				</div>
			  </div>
							<div class="form-group form-group-cell sm">
								<div class="select-wrapper">
			<?php
			if ( ! in_array( 'year', $exclude ) ) {
				echo $this->year_field( $atts );
			}
			?>
				</div>
			  </div>
		<?php endif; ?>
			  <input placeholder="State, Zip, Town" type="hidden" name="s">
							<div class="form-group form-group-cell">
								<div class="select-wrapper arrow-none">
				<input type="text" name="serviceestimatekey" class="form-control input-custom input-search" disabled="disabled" placeholder="Repair Needed"  id="estimatorInput1">
				<a href="#" data-toggle="modal" data-target="#fullServices"><?php esc_html_e( 'FULL LIST', 'estimate-plugin' ); ?></a>
			  </div>
			  </div>
			  <div class="form-group form-group-cell action">
			  
		<?php
		$est_search_bt = service_estimate_options( 'est_search_bt', true );
		if ( $est_search_bt ) {
			?>

			  <button class="btn btn-border" type="submit"><span><?php esc_html_e( 'GET ESTIMATE', 'estimate-plugin' ); ?></span></button>
		<?php } ?>
			  </div>
			</form>



		<?php
		$output = ob_get_clean();
		return apply_filters( 'carleader_listings_search_form_output', $output, $atts );
	}


	public function make_field( $atts ) {
		$make    = get_terms(
			array(
				'taxonomy'   => 'make-brand',
				'hide_empty' => false,
			)
		);
		$options = array();
		if ( $make ) {
			foreach ( $make as $key => $type ) {
				$options[ $type->term_id ] = $type->name;
			}
		}
		asort( $options );
		$args = array(
			'name'  => 'make',
			'label' => __( 'Make', 'estimate-plugin' ),
		);
		return $this->select_field( $options, $args );
	}
	public function model_field( $atts ) {
		$model   = get_terms(
			array(
				'taxonomy'   => 'model-car',
				'hide_empty' => false,
			)
		);
		$options = array();
		if ( $model ) {
			foreach ( $model as $key => $type ) {
				$options[ $type->term_id ] = $type->name;
			}
		}
		asort( $options );
		$args = array(
			'name'  => 'model',
			'label' => __( 'Model', 'estimate-plugin' ),
		);
		return $this->select_field( $options, $args );
	}
	public function year_field( $atts ) {
		$year    = get_terms(
			array(
				'taxonomy'   => 'model-year',
				'hide_empty' => false,
			)
		);
		$options = array();
		if ( $year ) {
			foreach ( $year as $key => $type ) {
				$options[ $type->term_id ] = $type->name;
			}
		}
		asort( $options );
		$args = array(
			'name'  => 'the_year',
			'label' => __( 'Year', 'estimate-plugin' ),
		);

		return $this->select_field( $options, $args );
	}

	public function select_field( $options, $args = array() ) {
		if ( empty( $options ) ) {
			return '';
		}
		$selected = isset( $_GET[ $args['name'] ] ) ? $_GET[ $args['name'] ] : '';
		ob_start();
		?>
	<select class="input-custom valid <?php echo esc_attr( $args['name'] ); ?>" 
												 <?php
													if ( $args['name'] != 'make' ) {
														echo 'disabled ';
													}
													?>
	 name="<?php echo esc_attr( $args['name'] ); ?>">
		<option value="" disabled=""  selected=""><?php echo esc_attr( $args['label'] ); ?></option>
		<?php foreach ( $options as $val => $text ) : ?>
		  <option value="<?php echo esc_attr( $val ); ?>"  ><?php echo esc_attr( $text ); ?></option>
		<?php endforeach; ?>
	</select>
		<?php
		if ( isset( $args['suffix'] ) ) {
			echo '<span class="suffix">' . esc_html( $args['suffix'] ) . '</span>';
		}
		?>
		<?php

		$output = ob_get_clean();
		return apply_filters( 'carleader_listings_search_field' . $args['name'], $output );
	}
	public function multiple_select_field( $options, $args = array() ) {
		if ( empty( $options ) ) {
			return '';
		}
		ob_start();
		$selected = isset( $_GET[ $args['name'] ] ) ? $_GET[ $args['name'] ] : '';
		$countsr  = 1;
		foreach ( $options as $val => $text ) :
			?>
	  <div class="form-group">
		<input type="checkbox" name="<?php echo esc_attr( $args['name'] ); ?>[]" id="<?php echo 'box' . $val; ?>" value="<?php echo esc_attr( $val ); ?>">
		<label for="<?php echo 'box' . $val; ?>"><?php echo esc_attr( $text ); ?></label>
	  </div>
		<?php endforeach; ?>
		<?php
		if ( isset( $args['suffix'] ) ) {
			echo '<span class="suffix">' . esc_html( $args['suffix'] ) . '</span>';
		}
		?>
		<?php
		$output = ob_get_clean();
		return apply_filters( 'carleader_listings_multiple_search_field' . $args['name'], $output );
	}

}
new SearchForm();
