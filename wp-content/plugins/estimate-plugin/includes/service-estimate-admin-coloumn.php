<?php

class ServiceEstimateAdminColoumn {

	public $filter_fields = [
		'status'    => 'statuses',
		'seller'    => 'sellers',
		'condition' => 'conditions',
	];

	public function __construct() {
		 add_filter( 'manage_service-estimate_posts_columns', [ $this, 'columns' ] );
		add_action( 'manage_service-estimate_posts_custom_column', [ $this, 'show' ], 10, 2 );

		// add_action( 'manage_body-type_custom_column', [ $this, 'body_type_data' ], 10, 3 );
		// add_action( 'manage_make-brand_custom_column', [ $this, 'make_brand_data' ], 10, 3 );

		// sorting
		add_filter( 'manage_edit-service-estimate_sortable_columns', [ $this, 'sortable_columns' ] );
		add_filter( 'request', [ $this, 'orderby_status' ] );
		add_filter( 'request', [ $this, 'orderby_seller' ] );
		add_filter( 'request', [ $this, 'orderby_price' ] );

		// filtering
		add_action( 'restrict_manage_posts', [ $this, 'output_filters' ] );
		add_action( 'parse_query', [ $this, 'filter' ] );
	}

	public function columns( $columns ) {
		$columns['part_count'] = __( 'Parts Count', 'estimate-plugin' );
		return $columns;
	}

	public function show( $column_name, $post_id ) {
		// if ( $column_name == 'status' ) {
		// $status = carleader_listings_meta( 'status', $post_id );
		// if ( ! $status ) {
		// return;
		// }
		// echo '<span class="btn status ' . esc_attr( strtolower( $status ) ) . '">' . esc_html( $status ) . '</div>';
		// }

		// if ( $column_name == 'seller' ) {
		// $seller_id = carleader_listings_meta( 'seller', $post_id );
		// $seller    = get_the_author_meta( 'display_name', $seller_id );
		// if ( ! $seller || ! $seller_id ) {
		// return;
		// }
		// echo esc_html( $seller );
		// }
	}

	public function sortable_columns( $columns ) {
		$columns['status']    = 'status';
		$columns['condition'] = 'condition';
		$columns['seller']    = 'seller';
		$columns['price']     = 'price';
		return $columns;
	}

	public function orderby_status( $vars ) {
		if ( isset( $vars['orderby'] ) && 'status' == $vars['orderby'] ) {
			$vars = array_merge(
				$vars,
				[
					'meta_key' => '_carleader_listing_status',
					'orderby'  => 'meta_value',
				]
			);
		}
		return $vars;
	}

	public function orderby_condition( $vars ) {
		if ( isset( $vars['orderby'] ) && 'condition' == $vars['orderby'] ) {
			$vars = array_merge(
				$vars,
				[
					'meta_key' => '_carleader_listing_condition',
					'orderby'  => 'meta_value',
				]
			);
		}
		return $vars;
	}

	public function orderby_seller( $vars ) {
		if ( isset( $vars['orderby'] ) && 'seller' == $vars['orderby'] ) {
			$vars = array_merge(
				$vars,
				[
					'meta_key' => '_carleader_listing_seller',
					'orderby'  => 'meta_value',
				]
			);
		}
		return $vars;
	}

	public function orderby_price( $vars ) {
		if ( isset( $vars['orderby'] ) && 'price' == $vars['orderby'] ) {
			$vars = array_merge(
				$vars,
				[
					'meta_key' => '_carleader_listing_price',
					'orderby'  => 'meta_value',
				]
			);
		}
		return $vars;
	}

	public function output_filters() {
		global $pagenow;
		$type = get_post_type() ? get_post_type() : 'service-estimate';
		if ( isset( $_GET['post_type'] ) ) {
			$type = sanitize_text_field( $_GET['post_type'] );
		}
		if ( 'service-estimate' !== $type || ! is_admin() || $pagenow !== 'edit.php' ) {
			return;
		}

		$fields = $this->build_fields();

		if ( ! $fields ) {
			return;
		}

		foreach ( $fields as $field => $values ) {
			asort( $values ); // sort our values
			$values = array_unique( $values ); // make them unique
			$values = array_filter( $values ); // remove empties

			$selected = isset( $_GET[ $field ] ) ? $_GET[ $field ] : '';
			?>
			<select name='<?php echo esc_attr( $field ); ?>' id='<?php echo esc_attr( $field ); ?>' class='postform'>

				<option value=''><?php printf( esc_html__( 'All %s', 'caeleader-listings' ), $field ); ?></option>

			<?php foreach ( $values as $val => $text ) : ?>
				<?php $text = $field == 'sellers' ? get_the_author_meta( 'display_name', $val ) : $text; ?>
					<option value="<?php echo esc_attr( $val ); ?>" <?php selected( $selected, $val ); ?>><?php echo esc_html( $text ); ?></option>
			<?php endforeach; ?>

			</select>
			<?php
			reset( $values );
		}
	}

	/**
	 * Build the dropdown field values for the filtering
	 */
	private function build_fields() {
		// $fields = '';

		// // The Query args
		// $args = [
		// 'post_type'      => 'service-estimate',
		// 'posts_per_page' => '-1',
		// 'post_status'    => 'publish',
		// ];

		// $query = query_posts( $args );

		// if ( $query ) {
		// $fields = [];
		// foreach ( $query as $listing ) {
		// foreach ( $this->filter_fields as $field => $text ) {
		// $val                     = carleader_listings_meta( $field, $listing->ID );
		// $fields[ $text ][ $val ] = $val;
		// }
		// }
		// }

		// wp_reset_query();
		// return $fields;
	}

	public function filter( $query ) {
		global $pagenow;
		$type = get_post_type() ? get_post_type() : 'service-estimate';
		if ( isset( $_GET['post_type'] ) ) {
			$type = sanitize_text_field( $_GET['post_type'] );
		}
		if ( 'service-estimate' !== $type || ! is_admin() || $pagenow !== 'edit.php' ) {
			return;
		}

		foreach ( $this->filter_fields as $field => $text ) {
			if ( isset( $_GET[ $text ] ) && $_GET[ $text ] != '' ) {
				$query->query_vars['meta_key']   = '_carleader_listing_' . $field;
				$query->query_vars['meta_value'] = sanitize_text_field( $_GET[ $text ] );
			}
		}
	}
}

new ServiceEstimateAdminColoumn();


